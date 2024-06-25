<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function templates(){
        return $this->hasMany(Template::class);
    }

    public function translation()
    {
        return $this->hasOne(CategoryTranslation::class)->where('lang', app()->getLocale());
    }
}
