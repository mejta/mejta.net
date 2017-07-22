<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Config;
use App;

class WebController extends Controller
{
    public function index()
    {   
        return view('index', [
            'locale' => App::getLocale(),
            'languages' => Config::get('languages'),
        ]);
    }
}
