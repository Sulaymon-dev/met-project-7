<?php

namespace App\Http\Controllers\API\V1;

use App\Http\Controllers\Controller;
use App\Plan;
use App\Sinf;
use App\Subject;
use App\Theme;
use Illuminate\Http\Request;

class AppController extends Controller
{
    public function getClasses()
    {
        $sinfs = Sinf::where('status', '=', '1')->get();
        return response()->json(['data' => $sinfs, 'status' => '200'], '200');
    }

    public function getSubjects()
    {
        $subject = Subject::where('status', '=', '1')->get();
        return response()->json(['data' => $subject, 'status' => '200'], '200');
    }

    public function getClassesBySubject(Request $request)
    {
        $subject_id = $request->input('subject_id');
        $sinfs = Sinf::select('sinfs.id as id', 'sinfs.class', 'plans.subject_id as subject_id')->leftJoin('plans', 'plans.sinf_id', '=', 'sinfs.id')->where('plans.subject_id', '=', $subject_id)->get()
            ->unique(function ($item) {
                return $item->class;
            });
        return response()->json(['data' => $sinfs, 'status' => '200'], '200');
    }

    public function getSubjectsByClasses(Request $request)
    {
        $sinf_id = $request->input('sinf_id');
        $subjects = Subject::select('subjects.id as id', 'subjects.slug', 'subjects.name', 'plans.sinf_id as sinf_id')
            ->leftJoin('plans', 'plans.subject_id', '=', 'subjects.id')->where('plans.sinf_id', '=', $sinf_id)->get()
            ->unique(function ($item) {
                return $item->name;
            });
        return response()->json(['data' => $subjects, 'status' => '200'], '200');
    }

    public function getThemes(Request $request)
    {
        $sinf_id = $request->input('sinf_id');
        $subject_id = $request->input('subject_id');
        $plan = Plan::where([['sinf_id', '=', $sinf_id], ['subject_id', '=', $subject_id], ['status', '=', '1'], ['is_show', '=', '0']])
            ->with(['book', 'sinf', 'subject', 'themes:id,plan_id,theme_num,name,introduction,status,is_show'])
            ->first();

        return response()->json(['data' => $plan, 'status' => '200'], '200');

    }

    public function getThemeById(Request $request)
    {
        $theme_id = $request->input('theme_id');
        $theme = Theme::where([['id', '=', $theme_id], ['status', '=', '1'], ['is_show', '=', '1']])->first();
        return response()->json(['data' => $theme, 'status' => '200'], '200');
    }
}
