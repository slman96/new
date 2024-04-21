<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;

class LangController extends Controller
{
    public function change($lang){
        Session::put("lang", $lang);
        App::setLocale($lang);
        return back();
    }
}
