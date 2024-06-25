<?php

namespace App\Http\Controllers\Admin\Category;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\CategoryRequest;
use App\Traits\Category\CategoryTrait;
use Illuminate\Http\Request;

class StoreController extends Controller
{
    use CategoryTrait;

    public function __invoke(CategoryRequest $request){

        $res = $this->updateOrCreate($request->all());

        return $res ? redirect()->route('category.index')->with('success', 'succec_message') : redirect()->route('category.index')->with('error', 'error_message');

    }
}
