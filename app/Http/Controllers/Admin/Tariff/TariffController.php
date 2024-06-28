<?php

namespace App\Http\Controllers\Admin\Tariff;

use App\Http\Controllers\Controller;
use App\Models\Tariff;
use Illuminate\Http\Request;

class TariffController extends Controller
{
    public function __invoke(Request $request){

        $tariffs = Tariff::where('id', '>', 0)->paginate(10);

        return view('tariff.index', compact('tariffs'))
            ->with('i', ($request->input('page', 1) - 1) * 10);
    }
}
