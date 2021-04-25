<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\MMT;
use App\Olympic;
use App\Theme;
use App\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
        $userCount = User::count();
        $themesCount = Theme::count();
        $olymicsCount = Olympic::count();
        $mmtCount = MMT::count();
        return view('admin.index',compact('userCount','themesCount','olymicsCount','mmtCount'));
    }
}
