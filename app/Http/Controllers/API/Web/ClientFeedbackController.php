<?php

namespace App\Http\Controllers\API\Web;

use App\Http\Controllers\Controller;
use App\Http\Requests\API\Web\ClientFeedbackRequest;
use App\Traits\ClientFeedbackTrait;
use Illuminate\Http\Request;

class ClientFeedbackController extends Controller
{
    use ClientFeedbackTrait;
    public function __invoke(ClientFeedbackRequest $request){

        $this->sendMessage($request->all());
    }
}
