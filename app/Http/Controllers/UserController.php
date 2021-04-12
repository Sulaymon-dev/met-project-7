<?php

namespace App\Http\Controllers;

use App\Plan;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function login(Request $request)
    {
        dd(11);
    }

    public function profile(Request $request)
    {
        $user = $request->user();
        $sinf = 1;
        $theme = Plan::where('sinf_id', $sinf)->with('book', 'sinf', 'subject')->withCount('themes')->get();
        return view('front.pages.profile', compact('user','theme','sinf'));
    }
}
