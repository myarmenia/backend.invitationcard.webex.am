<?php
use App\Models\Category;
use App\Models\Template;

if (!function_exists('languages')) {
    function languages()
    {
        return ['am', 'ru', 'en'];
    }
}


if (!function_exists('categories')) {
    function categories()
    {
        return Category::all();
    }
}

if (!function_exists('templates')) {
    function templates()
    {
        return Template::all();
    }
}


if (!function_exists('templatesFilter')) {
    function templatesFilter($array)
    {
        return Template::whereIn('category_id', $array)->get();
    }
}
