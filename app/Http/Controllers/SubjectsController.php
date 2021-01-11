<?php

namespace App\Http\Controllers;

use App\Plan;
use App\Subject;

class SubjectsController extends Controller
{
    public function index()
    {
        $subjects = Subject::all();
        $plan = Plan::all();

        return view('front.pages.subjects')->with(compact(['subjects', 'plan']));
    }

    public function show($slug)
    {
        $subject = Subject::where('slug', $slug)->with(['plans.book', 'plans.sinf', 'plans.theme'])->firstOrFail();


//        return $subject;


        return view('front.pages.subject', compact(['subject']));
    }
}
