<?php

namespace App\Http\Controllers\API\Web;

use App\Http\Controllers\API\BaseController;
use App\Http\Controllers\Controller;
use App\Http\Requests\API\Web\ClientFeedbackRequest;
use App\Traits\ClientFeedbackTrait;
use Illuminate\Http\Request;

class ClientFeedbackController extends BaseController
{
    use ClientFeedbackTrait;
    public function __invoke(ClientFeedbackRequest $request){

        $result = $this->sendMessage($request->all());
        if($result){

            return $this->sendResponse('', __('client_feedback.success_message'));
        }

        return $this->sendError(__('client_feedback.error_message'));

    }
}
