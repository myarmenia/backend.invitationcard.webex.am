<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tariff extends Model
{
    use HasFactory;
    protected $guarded = [];
    public function translation()
    {
        return $this->hasOne(TariffsTranslation::class)->where('lang', app()->getLocale());
    }

}
