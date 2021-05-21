<?php

namespace App\Http\Controllers;

use App\Plan;
use App\Sinf;
use App\Subject;
use App\Theme;
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
        $subject = Subject::where('slug', $slug)->with(['plans.book', 'plans.sinf', 'plans.themes'])->first();
        $allClass = Sinf::where('status', 1)->get()->sortBy("class");
        $class = [];
        foreach ($allClass as $classes) {
            foreach ($subject->plans as $plan) {
                if ($plan->sinf->class === $classes->class)
                    $class[] = $classes;
            }
        }

        if ($request->query('sinf')) {
            $sinf = $request->query('sinf');
        } elseif (count($subject->plans)>0) {
            $sinf = $subject->plans[0]->sinf->class;
        } else {
            $sinf = 1;
        }
        $theme = Plan::where('sinf_id', $sinf)->where('subject_id', $subject->id)->with(['themes', 'book'])->first();
        return view('front.pages.subject', compact(['subject', 'sinf', 'theme', 'class']));
    }

    public function sinf(Request $request)
    {
        ($request->query('id')) ? $sinf = $request->query('id') : $sinf = 1;
        $class = Sinf::where('status', 1)->get()->sortBy("class");
        $theme = Plan::where([['sinf_id', $sinf], ['is_show', 1]])->with('book', 'sinf', 'subject')->withCount('themes')->get();
        return view('front.pages.subject-class', compact(['theme', 'class', 'sinf']));
    }

    public function theme($id, Request $request)
    {
        $theme = Theme::where('id', $id)->with(['plan.book', 'plan.sinf', 'plan.subject'])->first();
        ($request->query('content')) ? $content = $request->query('content') : $content = 'dars';
        $path = '';
        $data = [];
        $test = null;
        if (!empty($theme['test'])) {
            $test = json_decode($theme['test'], true);
        }
        $type = '';
        if ($test) {
            foreach ($test['tests'] as $exercise) {
                $data[] = json_encode($exercise['data']);
            }
        }
        $test = (array)$test;
        return view('front.pages.theme', compact(['theme', 'path', 'content', 'test', 'type']));
    }
}
