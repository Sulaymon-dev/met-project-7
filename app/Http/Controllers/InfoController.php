<?php

namespace App\Http\Controllers;

use App\Page;

class InfoController extends Controller
{
    public function page(Page $page)
    {
        return view('front.pages.info', compact('page'));
    }

    public function about()
    {
        return view('front.pages.about');
    }
}
