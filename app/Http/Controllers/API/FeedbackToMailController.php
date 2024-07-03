<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\API\FeedbackToMailRequest;
use Illuminate\Http\Request;
use App\Mail\FeedbackMail;
use Mail;

class FeedbackToMailController extends Controller
{
    public function __invoke(FeedbackToMailRequest $request){
        // dd($request->all());
        // mail::send(Feedback)
         Mail::send(new FeedbackMail($request->all()));

    }
}
