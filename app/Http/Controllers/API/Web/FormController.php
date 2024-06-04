<?php

namespace App\Http\Controllers\API\Web;

use App\Http\Controllers\API\BaseController;
use App\Http\Controllers\Controller;
use App\Http\Requests\API\Web\ApiFormRequest;
use App\Models\Form;
use App\Traits\FormTrait;
use App\Traits\Payments\OrderTrait;
use App\Traits\Payments\PaymentRegister;
use App\Traits\Payments\PaymentTrait;
use Illuminate\Http\Request;

class FormController extends BaseController
{
    use FormTrait, PaymentRegister, PaymentTrait, OrderTrait;
    public function __invoke(ApiFormRequest $request){

        
        $lang = $request->header('Accept-Language') ?? 'am';
        $request['language'] = $lang;

        $create_form = $this->createForm($request->all());

        if($create_form){
            $redirect_url = $this->register($create_form);

            if ($redirect_url == 'error_payment') {
                return $this->sendError(__('messages.error_payment'));
            }

            $responce['redirect_url'] = $redirect_url;

            return $this->sendResponse($responce, 'success');
        }



        // return $proces ? $this->sendResponse([], 'success') : $this->sendError(__('messages.error_server'));
    }
}
