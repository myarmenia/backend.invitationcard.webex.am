<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Template extends Model
{
    use HasFactory;
    protected $guarded = [];
    public $relationItems = ['forms'];   // only for delete method / check has reletion or no / if there is no connection, then just delete it

    public function forms()
    {
        return $this->hasMany(Form::class);
    }
    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id');
    }

    public function translation()
    {
        return $this->hasOne(TemplateTranslation::class)->where('lang', app()->getLocale());
    }

    public function translate($lang)
    {
        return $this->hasOne(TemplateTranslation::class)->where('lang', $lang)->first();
    }
}
