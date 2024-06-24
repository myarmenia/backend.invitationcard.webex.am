<?php

namespace App\Services;


use App\Services\Log\LogService;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class DeleteItemService
{
    public static function delete($tb_name, $id)
    {

        $className = 'App\Models\\' . Str::studly(Str::singular($tb_name));
        $model = '';

        if(class_exists($className)) {

            $model = new $className;
        }

        if(!is_string($model)){

            $item = $model->where('id', $id);

            $file_path = '';
            $item_db = $item->first();
            $relationCounts = [];

            if ($item_db) {
                $relations = $model->relationItems;

                if(isset($relations)){
                    foreach ($relations as $k => $relation) {
                        if ($item_db->{$relation}()->exists()) {

                            array_push($relationCounts, $item_db->{$relation}->count());
                        }

                    }
                }


                if(count($relationCounts) == 0){
                    if (isset($item_db->images)) {
                        Storage::disk('public')->deleteDirectory("$tb_name/$id");

                    } else {

                        if (isset($item_db->logo)) {
                            $file_path = $item_db->logo;
                        }

                        if (isset($item_db->video)) {
                            $file_path = $item_db->video;
                        }

                        if (isset($item_db->path)) {
                            $file_path = $item_db->path;
                        }

                        if (isset($item_db->images_path)) {
                            $file_path = $item_db->images_path;
                        }

                        Storage::delete($file_path);
                    }

                    $delete = $item ? $item->delete() : false;

                    return $delete;

                }
                else{
                    return 'hasRelation';
                }
            }
            else{
                return false;
            }


        }

    }
}
