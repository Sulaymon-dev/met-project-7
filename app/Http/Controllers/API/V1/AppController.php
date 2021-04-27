<?php

namespace App\Http\Controllers\API\V1;

use App\Article;
use App\Http\Controllers\Controller;
use App\Olympic;
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
            })->values();
        return response()->json(['data' => $sinfs, 'status' => '200'], '200');
    }

    public function getSubjectsByClasses(Request $request)
    {
        $sinf_id = $request->input('sinf_id');
        $subjects = Subject::select('subjects.id as id', 'subjects.slug', 'subjects.name', 'plans.sinf_id as sinf_id')
            ->leftJoin('plans', 'plans.subject_id', '=', 'subjects.id')->where('plans.sinf_id', '=', $sinf_id)->get()
            ->unique(function ($item) {
                return $item->name;
            })->values();


        return response()->json(['data' => $subjects, 'status' => '200'], '200');
    }

    public function getThemes(Request $request)
    {
        $sinf_id = $request->input('sinf_id');
        $subject_id = $request->input('subject_id');
        $query = Plan::where([ ['status', '=', '1'], ['is_show', '=', '1']]);
        if (isset($sinf_id)) {
            $query->where('sinf_id', '=', $sinf_id);
        }
        if (isset($subject_id)) {
            $query->where('subject_id', '=', $subject_id);
        }
        $plan = $query
            ->with(['book', 'sinf', 'subject', 'themes:id,plan_id,theme_num,name,introduction,status,is_show'])
            ->get();
        return response()->json(['data' => $plan, 'status' => '200'], '200');
    }

    public function getThemeById(Request $request)
    {
        $theme_id = $request->input('theme_id');
        $theme = Theme::where([['id', '=', $theme_id], ['status', '=', '1'], ['is_show', '=', '1']])->first();
        return response()->json(['data' => $theme, 'status' => '200'], '200');
    }

    public function getOlympics(Request $request)
    {
        $sinf_id = $request->input('sinf_id');
        $subject_id = $request->input('subject_id');
        $query = Olympic::where([['status', '=', '1'], ['is_show', '=', '1']]);
        if (isset($sinf_id)) {
            $query->where('sinf_id', '=', $sinf_id);
        }
        if (isset($subject_id)) {
            $query->where('subject_id', '=', $subject_id);
        }
        $olympics = $query->get()->makeHidden('test');
        return response()->json(['data' => $olympics, 'status' => '200'], '200');
    }

    public function getOlympicById(Request $request)
    {
        $olympic_id = $request->input('olympic_id');
        $olympic = Olympic::where([['id', '=', $olympic_id], ['status', '=', '1'], ['is_show', '=', '1']])->first();
        return response()->json(['data' => $olympic, 'status' => '200'], '200');
    }

    public function getNews()
    {
        $news = Article::select('id', 'title', 'description', 'img_src', 'status', 'created_at', 'updated_at')->where('status', '=', '1')->latest()->get();
        return response()->json(['data' => $news, 'status' => '200'], 200);
    }

    public function getNewById(Request $request)
    {
        $new_id = $request->input('new_id');
        $new= Article::where([['id', '=', $new_id], ['status', '=', '1']])->get();
        return response()->json(['data' => $new, 'status' => '200'], '200');
    }
}
