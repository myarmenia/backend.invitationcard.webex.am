<?php

namespace App\Http\Controllers\Admin\Template;

use App\Http\Controllers\Controller;
use App\Models\Template;
use Illuminate\Http\Request;

class EditController extends Controller
{
    public function __invoke($id)
    {
        $template = Template::find($id);
        return view('template.edit', compact('template'));
    }
}
