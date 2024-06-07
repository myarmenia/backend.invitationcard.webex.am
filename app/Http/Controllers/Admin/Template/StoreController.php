<?php

namespace App\Http\Controllers\Admin\Template;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\TemplateRequest;
use App\Traits\Template\TemplateTrait;
use Illuminate\Http\Request;

class StoreController extends Controller
{
    use TemplateTrait;
    public function __invoke(TemplateRequest $request){
// dd($request->all());
        $res = $this->updateOrCreate($request->all());

        return $res ? redirect()->route('template.index')->with('success', 'succec_message') : redirect()->route('template.index')->with('error', 'error_message');

    }
}
