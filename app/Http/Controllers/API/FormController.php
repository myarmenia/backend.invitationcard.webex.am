<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\API\BaseController;
use App\Http\Controllers\Controller;
use App\Http\Requests\API\ApiFormRequest;
use App\Models\Form;
use App\Traits\FormTrait;
use App\Traits\GenerateLinkTrait;
use App\Traits\Payments\OrderTrait;
use App\Traits\Payments\PaymentRegister;
use App\Traits\Payments\PaymentTrait;
use App\Traits\TariffsTrait;
use Illuminate\Http\Request;

class FormController extends BaseController
{
    use FormTrait, PaymentRegister, PaymentTrait, OrderTrait, TariffsTrait, GenerateLinkTrait;
    public function __invoke(ApiFormRequest $request){


        $lang = $request->header('Accept-Language') ?? 'am';
        $request['language'] = $lang;


        $create_form = $this->createForm($request->all());

        if($create_form){

            if(!empty($request->promo_code)){

                $template_route = $create_form->template->route;

                $link = $this->autoGenerateLink($create_form);

                if($link){

                    $redirect_url = "https://invitationcard.webex.am/am/?event_url=$link";

                    $responce['redirect_url'] = $redirect_url;

                    return $this->sendResponse($responce, 'success');

                }
                else{
                    return $this->sendError(__('messages.system_error'));
                }

            }
            else{
                $redirect_url = $this->register($create_form);

                if ($redirect_url == 'error_payment') {
                    return $this->sendError(__('messages.error_payment'));
                }

                $responce['redirect_url'] = $redirect_url;

                return $this->sendResponse($responce, 'success');

            }

        }
        else{
            return $this->sendError(__('messages.system_error'));

        }

    }
}
