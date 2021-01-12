<?php

namespace App\Http\Controllers;

use App\Plan;
use App\Subject;
use Illuminate\Http\Request;

class SubjectsController extends Controller
{
    public function index()
    {
        $subjects = Subject::with('plans')->get();

//        return $subjects;

        return view('front.pages.subjects')->with(compact(['subjects']));
    }

    public function show($slug, Request $request)
    {
        $subject = Subject::where('slug', $slug)->with(['plans.book', 'plans.sinf', 'plans.theme'])->first();

        return $subject ;
        $sinf = $request->query('sinf');


//        return $subject ;

        return view('front.pages.subject', compact(['subject', 'sinf']));
    }
}
