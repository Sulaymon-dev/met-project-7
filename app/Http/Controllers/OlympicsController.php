<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Plan;
use App\Sinf;
use App\Theme;
use App\Subject;

use App\Olympic;


class OlympicsController extends Controller
{
   public function index(Request $request){
        ($request->query('sinf')) ? $sinf =(int)$request->query('sinf') : $sinf = 5;
        $class = Sinf::where('status', 1)->with('olympics')->get()->sortBy("class");
        $olympics = Olympic::with('sinf','subject')->get();
        return view('front.pages.olympics', compact(['class', 'sinf','olympics']));
   	}


    public function show($id, Request $request)
    {
        $olympic = Olympic::where('id', $id)->with(['sinf', 'subject'])->first();
        ($request->query('level')) ? $level = (int)$request->query('level') : $level = 1;
		$levels = Olympic::where('subject_id', $olympic['subject_id'])->where('sinf_id', $olympic['sinf_id'])->get()->pluck('level');
        $path = '';
        $data = [];
        $test = null;
        if (!empty($olympic['test'])) {
            $test = json_decode($olympic['test'], true);
        }
        $type='';
        foreach ($test['tests'] as $exercise) {
            $data[] = json_encode($exercise['data']);
        }
        return view('front.pages.olympics_info', compact(['olympic', 'path', 'level', 'test', 'type']));
    }
}
