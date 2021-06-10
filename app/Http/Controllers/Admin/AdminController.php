<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\MMT;
use App\Olympic;
use App\Theme;
use App\User;

class AdminController extends Controller
{
    public function index()
    {
        $userCount = User::whereStatus(1)->count();
        $themesCount = Theme::whereStatus(1)->count();
        $olymicsCount = Olympic::whereStatus(1)->count();
        $mmtCount = MMT::whereStatus(1)->count();
        $teachers = User::whereRole('teacher')
            ->withCount(['themes' => function ($q) {
                $q->whereStatus(1);
            }])->withCount(['books' => function ($q) {
                $q->whereStatus(1);
            }])->withCount(['plans' => function ($q) {
                $q->whereStatus(1);
            }])
            ->get()->sortByDesc('themes_count');
        return view('admin.index', compact('userCount', 'themesCount', 'olymicsCount', 'mmtCount', 'teachers'));
    }
}
