<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;

class LocalizationController extends Controller
{
    public function switchLang($lang)
    {
        App::setLocale($lang);
        Session::put('applocale', $lang);
        return Redirect::back();
    }
}
