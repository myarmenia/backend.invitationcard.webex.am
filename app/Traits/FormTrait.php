<?php
namespace App\Traits;
use App\Models\ClientFeedback;
use App\Models\Form;
use App\Models\Image;
use App\Models\Section;
use App\Services\FileUploadService;

trait FormTrait {

    public function createForm($data){

        // ============= create form ========================
        $token = $this->generateToken();
        $form_data = [
            'invitation_name' => $data['invitation_name'],
            'template_id' => $data['template_id'],
            'promo_code' => $data['promo_code'] ?? null,
            'tariff_id' => $data['tariff_id'] ?? null,
            'template_route' => $data['template_route'],
            'language' => $data['language'],
            'date' => $data['date'],
            'sound_path' => $data['sound_path'] ?? null,
            'token' => $token,
            'age' => $data['age'] ?? null
        ];

        $form = Form::create($form_data);

        // ======== add logo path ======================

        if (isset($data['logo_path'])) {
            // $logo_path = FileUploadService::uploadBase64($data['logo_path'], 'logo/' . $form->id);
            $logo_path = FileUploadService::upload($data['logo_path'], 'logo/' . $form->id);

            $form->update(['logo_path' => $logo_path]);
        }

        if (isset($data['feedback'])) {

            ClientFeedback::create([
                'form_id' => $form->id,
                'type' => $data['type'] ?? 'whatsapp',
                'feedback' => $data['feedback']
            ]);

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

                    foreach ($images as $image) {
                        // $image_path = FileUploadService::uploadBase64($image, "forms/$form_id/sections/$section->id");
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
