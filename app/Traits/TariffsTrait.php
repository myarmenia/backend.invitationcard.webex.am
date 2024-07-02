<?php
namespace App\Traits;
use App\Models\Tariff;
use App\Models\TariffsTranslation;


trait TariffsTrait
{
    public function getTariff($tariff_id)
    {
        return Tariff::find($tariff_id);
    }


    public function updateOrCreate(array $data)
    {

        try {

            $tariff_id = isset(request()->id) ? request()->id : null;

            $translations = $data['translations'];
            unset($data['translations']);

            $existingTariffy = null;

            if ($tariff_id) {
                $existingTariffy = Tariff::find($tariff_id);
            }


            $tariff = Tariff::updateOrCreate(['id' => $tariff_id], $data);

            foreach ($translations as $key => $item) {
                TariffsTranslation::updateOrCreate(
                    [
                        'tariff_id' => $tariff->id,
                        'lang' => $key
                    ],
                    [
                        'tariff_id' => $tariff->id,
                        'lang' => $key,
                        'name' => $item['name'],
                        'desc' => $item['desc'],
                        'info_title' => $item['info_title'],
                        'info_text' => $item['info_text'],
                        'info_items' => json_encode($item['info_items']),


                    ]
                );
            }

            return true;
        } catch (\Throwable $th) {
            return false;

        }
    }
}
