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

            $template_id = isset(request()->id) ? request()->id : null;

            $translations = $data['translations'];
            unset($data['translations']);

            if (isset($data['image_path'])) {
                $image_path = FileUploadService::upload($data['image_path'], 'templates');
                $data['image_path'] = $image_path;

            }

            $template = Template::updateOrCreate(['id' => $template_id], $data);

            foreach ($translations as $key => $item) {
                TemplateTranslation::updateOrCreate(
                    [
                        'template_id' => $template->id,
                        'lang' => $key
                    ],
                    [
                        'template_id' => $template->id,
                        'lang' => $key,
                        'name' => $item['name']

                    ]);
            }

            return true;
        } catch (\Throwable $th) {
            return false;

        }
    }


}
