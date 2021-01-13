<?php

namespace App\Http\Controllers;

use App\Plan;
use App\Sinf;
use App\Subject;
use Illuminate\Http\Request;

class SubjectsController extends Controller
{
    public function index()
    {
        $subjects = Subject::with('plans')->get();

        return view('front.pages.subjects')->with(compact(['subjects']));
    }

    public function show($slug, Request $request)
    {
        $subject = Subject::where('slug', $slug)->with(['plans.book', 'plans.sinf', 'plans.theme'])->first();


        ($request->query('sinf')) ? $sinf = $request->query('sinf') : $sinf = 1;

        $theme = Plan::where('sinf_id', $sinf)->where('subject_id', $subject->id)->with('theme')->first();


        return view('front.pages.subject', compact(['subject', 'sinf', 'theme']));
    }

    public function sinf(Request $request)
    {

        ($request->query('id')) ? $sinf = $request->query('id') : $sinf = 1;



        $class = Sinf::where('status', 1)->get()->sortBy("class");

        $theme = Plan::where('sinf_id', $sinf)->with('book', 'sinf','subject')->withCount('theme')->get();

//        return $theme;

        return view('front.pages.subject-class', compact(['theme', 'class', 'sinf']));
    }

    public function theme($slug)
    {



    }

}
