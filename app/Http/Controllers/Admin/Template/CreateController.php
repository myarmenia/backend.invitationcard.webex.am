<?php

namespace App\Http\Controllers\Admin\Template;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CreateController extends Controller
{
    public function __invoke(){
        return view('template.create');
    }
}
