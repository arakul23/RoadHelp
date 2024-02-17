<?php

namespace App\Http\Controllers;

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class LanguageController extends Controller
{
    public function set(Request $request): RedirectResponse
    {
        Session::put('language', $request->input('language'));

        return redirect()->back();
    }
}
