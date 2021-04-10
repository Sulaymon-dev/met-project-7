<?php

namespace App\Http\Controllers;

use App\Info;

class InfoController extends Controller
{
    public function show($slug)
    {
//        $info = Info::where('slug',$slug)->first();
        $info = null;
        return view('front.pages.info', compact('info'));
    }

    public function about()
    {
        return view('front.pages.about');
    }
}
