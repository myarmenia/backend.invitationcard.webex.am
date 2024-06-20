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

        if(isset($request->p_token)){
            $id = $request->token / 2024;
            $form = Form::where(['promo_code' => $request->p_token, 'id' => $id])->first();
        }
        else{
            $order = Order::where(['status' => 1, 'order_id' => $token])->first();
            $form = $order ? $order->form : null ;
        }

        if($form){
            // $form = $order->form;
            return $this->sendResponse(new EventResultResource($form), 'success');
        }

        else{
            return $this->sendError('error');
        }


    }
}
