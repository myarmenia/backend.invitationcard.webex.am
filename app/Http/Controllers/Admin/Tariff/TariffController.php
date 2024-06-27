<?php

namespace App\Http\Controllers\Admin\Tariff;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class TariffController extends Controller
{
    public function __invoke(Request $request){

        $ctegories = Category::where('id', '>', 0)->paginate(10);

        return view('category.index', compact('ctegories'))
            ->with('i', ($request->input('page', 1) - 1) * 10);
    }
}
