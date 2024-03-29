<?php

namespace App\Http\Controllers\API\V1;

use App\Article;
use App\Cluster;
use App\Http\Controllers\Controller;
use App\MmtFan;
use App\Olympic;
use App\Plan;
use App\Setting;
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
        $subjects = Subject::select('subjects.id as id', 'subjects.slug', 'subjects.name', 'image_src', 'plans.sinf_id as sinf_id')
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
        $query = Plan::where([['status', '=', '1'], ['is_show', '=', '1']]);
        if (isset($sinf_id)) {
            $query->where('sinf_id', '=', $sinf_id);
        }
        if (isset($subject_id)) {
            $query->where('subject_id', '=', $subject_id);
        }
        $plan = $query
            ->with(['book', 'sinf', 'subject', 'themes:id,plan_id,theme_num,name,introduction,status,is_show'])
            ->first();
        return response()->json(['data' => $plan, 'status' => '200'], '200');
    }

    public function getThemes1(Request $request)
    {
        $sinf_id = $request->input('sinf_id');
        $subject_id = $request->input('subject_id');
        $query = Plan::where([['status', '=', '1'], ['is_show', '=', '1']]);
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
        $theme->test = json_decode($theme->test);
        return response()->json(['data' => $theme, 'status' => '200'], '200');
    }

    public function getOlympicsSinfs()
    {
        $sinfs = Olympic::select('sinf_id', 'id')->with('sinf')->get()->unique(function ($item) {
            return $item->sinf->class;
        });
        $data = [];
        foreach ($sinfs as $sinf) {
            $data[] = [
                'sinf' => $sinf->sinf->class,
                'sinf_id' => $sinf->sinf->id
            ];
        }
        return response()->json(['data' => $data, 'status' => 200], 200);
    }

    public function getOlympicSubjectsByClass(Request $request)
    {
        $sinf_id = $request->get('sinf_id');
        $subjects = Olympic::select('id', 'sinf_id', 'subject_id')->with(['sinf', 'subject'])
            ->get()
            ->filter(function ($q) use ($sinf_id) {
                return $q->sinf->id == $sinf_id;
            })
            ->unique(function ($q) {
                return $q->subject->id;
            });

        $data = [];
        foreach ($subjects as $subject) {
            $data[] = [
                'subject_id' => $subject->subject->id,
                'subject_name' => $subject->subject->name,
                'class_id' => $subject->sinf->id,
                'class_name' => $subject->sinf->id
            ];
        }
        return response()->json(['data' => $data, 'status' => 200], 200);

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
        $olympics = $query->first();
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
        $news = Article::select('id', 'title', 'description', 'img_src', 'status', 'created_at', 'updated_at')->where('status', '=', '1')->latest()->limit(10)->get();
        return response()->json(['data' => $news, 'status' => '200'], 200);
    }

    public function getNewById(Request $request)
    {
        $new_id = $request->input('new_id');
        $new = Article::where([['id', '=', $new_id], ['status', '=', '1']])->get();
        return response()->json(['data' => $new, 'status' => '200'], '200');
    }

    public function getMainSlider()
    {
        $main_slider = Setting::where('key', '=', 'main_slider')->first();
        $main_slider->value = json_decode($main_slider->value);
        return response()->json(['data' => $main_slider, 'status' => 200], 200);
    }

    public function getSecondSlider()
    {
        $second_slider = Setting::where('key', '=', 'second_slider')->first();
        $second_slider->value = json_decode($second_slider->value);
        return response()->json(['data' => $second_slider, 'status' => 200], 200);
    }

    public function getClusters()
    {
        $clusters = Cluster::where('status', '=', '1')->get();
        return response()->json(['data' => $clusters], 200);
    }

    public function getClusterById(Request $request)
    {
        $new_id = $request->input('cluster_id');
        $new = Cluster::with(['mmts.subject'])->where([['id', '=', $new_id], ['status', '=', '1']])->first();
        return response()->json(['data' => $new, 'status' => '200'], '200');
    }

    public function getMmtResourceById(Request $request)
    {
        $res_id = $request->input('mmt_fan_id');
        $data = MmtFan::where([['id', '=', $res_id], ['status', '=', '1'], ['is_show', '=', '1']])->first();
        $data->test = json_decode($data->test);
        return response()->json(['data' => $data,'status'=>'200'],200);
    }
}
