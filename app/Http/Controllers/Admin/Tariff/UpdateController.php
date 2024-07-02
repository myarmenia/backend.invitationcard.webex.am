<?php

namespace App\Http\Controllers\Admin\Tariff;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\TariffRequest;
use App\Traits\TariffsTrait;
use Illuminate\Http\Request;

class UpdateController extends Controller
{
    use TariffsTrait;

    public function __invoke(TariffRequest $request)
    {

        $res = $this->updateOrCreate($request->all());

        return $res ? redirect()->route('tariff.index')->with('success', 'succec_message') : redirect()->route('tariff.index')->with('error', 'error_message');

    }
}
