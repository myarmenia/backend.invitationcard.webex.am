<?php

namespace App\Http\Controllers\Admin\Category;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryCantroller extends Controller
{
    public function __invoke(Request $request){

        $ctegories = Category::where('id', '>', 0)->paginate(10);

        return view('category.index', compact('ctegories'))
            ->with('i', ($request->input('page', 1) - 1) * 10);
    }
}
