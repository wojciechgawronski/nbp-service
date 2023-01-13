<?php

namespace App\Http\Controllers\web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DarkThemeController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        if (session()->has('isDarkTheme')) {
            session()->put('isDarkTheme', !session('isDarkTheme'));
        } else {
            session()->put('isDarkTheme', true);
        }

        return redirect()->back();
    }

}
