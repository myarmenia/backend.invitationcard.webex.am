<?php
namespace App\Traits\Template;
use App\Models\Template;
use App\Models\TemplateTranslation;
use App\Services\FileUploadService;


trait TemplateTrait
{
    public function updateOrCreate(array $data)
    {
        try {

            $translations = $data['translations'];
            unset($data['translations']);

            if (isset($data['image_path'])) {
                $image_path = FileUploadService::upload($data['image_path'], 'templates');
                $data['image_path'] = $image_path;

            }

            $template = Template::updateOrCreate(['categori_id' => $data['category_id']], $data);
dd($template);
            foreach ($translations as $key => $item) {

                TemplateTranslation::create([
                    'template_id' => $template->id,
                    'lang' => $key,
                    'name' => $item['name'],

                ]);
            }

            return true;
        } catch (\Throwable $th) {
            return false;

        }
    }


}
