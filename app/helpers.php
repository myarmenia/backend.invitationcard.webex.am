<?php
use App\Models\Category;

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
