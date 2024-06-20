<?php
namespace App\Traits;
use App\Models\Tariff;


trait TariffsTrait
{
    public function getTariff($tariff_id)
    {
        return Tariff::find($tariff_id);
    }

}
