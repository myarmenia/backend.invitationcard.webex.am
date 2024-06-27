<?php
namespace App\Traits\Category;


use App\Models\Category;
use App\Models\CategoryTranslation;
use App\Services\FileUploadService;
use Illuminate\Support\Facades\Storage;


trait CategoryTrait
{
    public function updateOrCreate(array $data)
    {

        try {

            $category_id = isset(request()->id) ? request()->id : null;

            $translations = $data['translations'];
            unset($data['translations']);

            $existingCategory = null;

            if ($category_id) {
                $existingTemplate = Category::find($category_id);
            }
            

            $category = Category::updateOrCreate(['id' => $category_id], $data);

            foreach ($translations as $key => $item) {
                CategoryTranslation::updateOrCreate(
                    [
                        'category_id' => $category->id,
                        'lang' => $key
                    ],
                    [
                        'category_id' => $category->id,
                        'lang' => $key,
                        'name' => $item['name']

                    ]
                );
            }

            return true;
        } catch (\Throwable $th) {
            return false;

        }
    }


}
