<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Language;

class LanguageController extends Controller
{
    public function switch_language(Request $request)
    {
        session()->put('session_short_name',$request->short_name);

        return redirect()->back();
    }
}
