<?php
namespace App\Traits;
use App\Models\Form;
use App\Models\Image;
use App\Models\Section;
use App\Services\FileUploadService;

trait FormTrait {

    public function createForm($data){

        // ============= create form ========================
        $form_data = [
            'invitation_name' => $data['invitation_name'],
            'template_id' => $data['template_id'],
            'language' => $data['language'],
            'date' => $data['date']
        ];

        $form = Form::create($form_data);

        // ======== add sound path ======================
        if(isset($data['sound_path'])){
            $sound_path = FileUploadService::upload($data['sound_path'], 'sound/' . $form->id);
            $form->update(['sound_path' => $sound_path]);
        }

        if (isset($data['logo_path'])) {
            $logo_path = FileUploadService::upload($data['logo_path'], 'logo/' . $form->id);
            $form->update(['logo_path' => $logo_path]);
        }

        if(isset($data['sections'])){

            $sections = $data['sections'];
            $create_section = $this->createSection($sections, $form->id);

            return $create_section ? $form : false;

        }

        return $form ? $form : false;

    }

    public function createSection($sections, $form_id){

        try {
            foreach ($sections as $key => $sec) {
                $images = [];
                $sec['form_id'] = $form_id;

                if (isset($sec['images'])) {
                    $images = $sec['images'];
                }

                unset($sec['images']);
                $section = Section::create($sec);

                if (count($images) > 0) {
                    foreach ($sec['images'] as $image) {
                        $image_path = FileUploadService::upload($image, "forms/$form_id/sections/$section->id");
                        Image::create([
                            'section_id' => $section->id,
                            'path' => $image_path
                        ]);
                    }
                }
            }

            return true;
        } catch (\Throwable $th) {
            return false;
        }



    }

}
