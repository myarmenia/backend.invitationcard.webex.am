<?php

namespace App\Http\Controllers\Admin\Tariff;

use App\Http\Controllers\Controller;
use App\Models\Tariff;
use Illuminate\Http\Request;

class EditController extends Controller
{
    public function __invoke($id)
    {
        $tariff = Tariff::find($id);
        return view('tariff.edit', compact('tariff'));
    }
}
