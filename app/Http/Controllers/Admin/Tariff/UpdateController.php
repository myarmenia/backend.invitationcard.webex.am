<?php

namespace App\Http\Controllers\Admin\Tariff;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class UpdateController extends Controller
{
    // use CategoryTrait;

    public function __invoke(CategoryRequest $request)
    {

        $res = $this->updateOrCreate($request->all());

        return $res ? redirect()->route('category.index')->with('success', 'succec_message') : redirect()->route('category.index')->with('error', 'error_message');

    }
}
