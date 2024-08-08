<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\API\BaseController;
use App\Http\Controllers\Controller;
use App\Http\Requests\API\EventResultRequest;
use App\Http\Resources\API\EventResultResource;
use App\Models\Form;
use App\Models\Order;
use Crypt;
use Hash;
use Illuminate\Http\Request;

class EventResultController extends BaseController
{
    public function __invoke(EventResultRequest $request){

        $token = $request->token;
        $form = Form::where('token', $token)->first();

        if($form){
            return $this->sendResponse(new EventResultResource($form), 'success');
        }

        else{
            return $this->sendError('error');
        }


    }
}
