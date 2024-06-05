<?php

namespace App\Http\Controllers\Admin\Template;

use App\Http\Controllers\Controller;
use App\Models\Template;
use Illuminate\Http\Request;

class TemplateCantroller extends Controller
{
    public function __invoke(Request $request)
    {

        $templates = Template::where('id', '>', 0)->paginate(10);

        return view('template.index', compact('templates'))
            ->with('i', ($request->input('page', 1) - 1) * 10);
    }
}
