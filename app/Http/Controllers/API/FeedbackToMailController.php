<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\API\FeedbackToMailRequest;
use Illuminate\Http\Request;
use App\Mail\FeedbackMail;
use Mail;

class FeedbackToMailController extends BaseController
{
    public function __invoke(FeedbackToMailRequest $request){
        try {

            Mail::send(new FeedbackMail($request->all()));
            return $this->sendResponse([], __('messages.email_success'));

        } catch (\Throwable $th) {
            return $this->sendError(__('messages.system_error'));

        }

    }
}
