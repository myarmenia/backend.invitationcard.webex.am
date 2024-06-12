<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Resources\API\HomeResource;
use App\Models\Template;
use Illuminate\Http\Request;

class HomeController extends BaseController
{
    public function __invoke(){

        return $this->sendResponse(new HomeResource([]), 'success');

    }
}
