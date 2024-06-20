<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Resources\API\TariffsResource;
use App\Models\Tariff;
use Illuminate\Http\Request;

class TariffsController extends BaseController
{
    public function __invoke(){

        $tariffs = Tariff::where('status', 1)->get();

        return $this->sendResponse(TariffsResource::collection($tariffs), 'success');
    }
}
