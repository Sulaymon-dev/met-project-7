<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Theme;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rule;

class ThemesController extends Controller
{

    public function __construct()
    {
        $this->authorizeResource(Theme::class, 'theme');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $query = Theme::select();
        $role = auth()->user()->role;
        if ($request->has('onlyThemes')) {
            $query->whereUserId(auth()->id());
        }
        if ($request->has('search')) {
            $search = $request->input('search');
            $query->where('name', 'like', "%$search%");
        }
        if ($request->has('user_id')){
            $query->whereUserId($request->input('user_id'));
        }
        $themes = $query
            ->orderBy("id", "desc")->paginate(25)
            ->appends(request()->query());
//        return $themes;
        return view('admin.themes.index', compact('themes', 'role'));
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.themes.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */

    public function store(Request $request)
    {
        $data = $request->validate([
            'plan_id' => 'required|numeric',
            'theme_num' => 'required',
            'name' => 'required',
            'introduction' => 'nullable',
            'exercise_type' => [
                'required',
                Rule::in(['matni', 'f_pdf']),
            ],
            'matni_data' => 'nullable',
            'f_pdf_file' => 'nullable|file',
            'video' => 'nullable|file',
            'pdf' => 'nullable|file',
            'video_src' => 'nullable|string',
            'pdf_src' => 'nullable|string',
            'status' => 'nullable|boolean',
            'is_show' => 'required|boolean',
        ]);

        $theme = new Theme;
        $theme->plan_id = $data['plan_id'];
        $theme->user_id = auth()->id();
        $theme->theme_num = $data['theme_num'];
        $theme->name = $data['name'];
        $theme->status = $data['status'] ?? 0;
        $theme->is_show = $data['is_show'] ?? 0;
        $theme->introduction = $data['introduction'] ?? null;
        $theme->test = '{
           "scripts": [
                "\/js\/quiz4x1.js",
                "\/js\/matching.js",
                "\/js\/openQuiz.js"
            ],
            "styles": [
                "\/css\/quiz4x1.css",
                "\/css\/matching.css",
                "\/css\/openQuiz.css"
            ],
          "tests": [

          ]
        }';
        if ($data['exercise_type'] == 'matni')
            $theme->pdf_exercise = $data['matni_data'];
        else
            $theme->pdf_exercise = $request->has('f_pdf_file') ? str_replace('public/uploads/pdf/', '', Storage::putFile('public/uploads/pdf', $request->file('f_pdf_file'))) : $data['f_pdf_file_src'];
        if (isset($data['video']))
            $theme->video_src = str_replace('public/uploads/videos/', '', Storage::putFile('public/uploads/videos', $request->file('video')));
        else
            $theme->video_src = $data['video_src'];
        if (isset($data['pdf']))
            $theme->pdf_src = str_replace('public/uploads/pdf/', '', Storage::putFile('public/uploads/pdf', $request->file('pdf')));
        else
            $theme->pdf_src = $data['pdf_src'];
        $theme->save();
        if ($theme) {
            alert()->success('Мавзуъ бо муваффакият изофа шуд', 'Илова шуд');
            return redirect(route('themes.index'));
        }
        return abort(419);
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Theme $theme
     * @return \Illuminate\Http\Response
     */
    public function show(Theme $theme)
    {
        return $theme;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Theme $theme
     * @return \Illuminate\Http\Response
     */
    public function edit(Theme $theme)
    {
        $theme->load('plan.sinf', 'plan.subject');
        $role = auth()->user()->role;
        return view('admin.themes.edit', compact('theme', 'role'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Theme $theme
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Theme $theme)
    {
        if ($request->input('isOnlyTestUpdate') && auth()->user()->role != 'moderator') {
            $theme->test = $request->input('data');
            $theme->save();
            return response(['status' => 'ok'], 200);
        }
        $isUpdatedSuccessfully = false;
        if (auth()->user()->role == 'moderator') {
            $status = $request->validate([
                'status' => 'required|boolean'
            ])['status'];
            $theme->status = $status;
            $theme->save();
            $isUpdatedSuccessfully = true;
        } else {
            $data = $request->validate([
                'plan_id' => 'required|numeric',
                'theme_num' => 'required',
                'name' => 'required',
                'introduction' => 'nullable',
                'exercise_type' => [
                    'required',
                    Rule::in(['matni', 'f_pdf']),
                ],
                'matni_data' => 'nullable',
                'f_pdf_file' => 'nullable|file',
                'video' => 'nullable|file',
                'pdf' => 'nullable|file',
                'video_src' => 'nullable|string',
                'pdf_src' => 'nullable|string',
                'f_pdf_file_src' => 'nullable|string',
                'status' => 'nullable|boolean',
                'is_show' => 'required|boolean',
                'saveOldPdf' => 'nullable|boolean',
                'saveOldVideos' => 'nullable|boolean',
                'saveOldPdfExercise' => 'nullable|boolean'
            ]);

            if (auth()->user()->role == 'teacher') $data['status'] = $theme->status;
            $theme->plan_id = $data['plan_id'];
            $theme->theme_num = $data['theme_num'];
            $theme->name = $data['name'];
            $theme->is_show = $data['is_show'] ?? 0;
            $theme->status = $data['status'] ?? 0;
            $theme->introduction = $data['introduction'] ?? null;
            if (!isset($data['saveOldPdf'])) {
                if (isset($data['pdf']) && $request->has('pdf'))
                    $theme->pdf_src = str_replace('public/uploads/pdf/', '', Storage::putFile('public/uploads/pdf', $request->file('pdf')));
                else
                    $theme->pdf_src = $data['pdf_src'];
            }
            if (!isset($data['saveOldVideos'])) {
                if (isset($data['video']) && $request->has('video'))
                    $theme->video_src = str_replace('public/uploads/videos/', '', Storage::putFile('public/uploads/videos', $request->file('video')));
                else
                    $theme->video_src = $data['video_src'];
            }
            if ($data['exercise_type'] == 'f_pdf') {
                if (!isset($data['saveOldPdfExercise'])) {
                    if (isset($data['f_pdf_file']) && $request->has('f_pdf_file'))
                        $theme->pdf_exercise = str_replace('public/uploads/pdf/', '', Storage::putFile('public/uploads/pdf', $request->file('f_pdf_file')));
                    else
                        $theme->pdf_exercise = $data['f_pdf_file_src'];
                }
            } else
                $theme->pdf_exercise = $data['matni_data'];
            $theme->save();
            $isUpdatedSuccessfully = true;
        }
        if ($isUpdatedSuccessfully) {
            alert()->success('Мавзуъ бо муваффакият тағйир дода шуд', 'Тағйир ёфт');
            return redirect('/admin/themes?page='.\request()->input('page'));
        }
        return abort(403);
    }

    public function showQuiz4in1()
    {
        $role = auth()->user()->role;
        return view('admin.themes.test_4in1', compact('role'));
    }

    public function showMatching()
    {
        $role = auth()->user()->role;
        return view('admin.themes.test_match', compact('role'));
    }

    public function showJson()
    {
        $role = auth()->user()->role;
        return view('admin.themes.test_json', compact('role'));
    }

    public function showOpenQuiz()
    {
        $role = auth()->user()->role;
        return view('admin.themes.test_open', compact('role'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Theme $theme
     * @return \Illuminate\Http\Response
     */
    public function destroy(Theme $theme)
    {
        try {
            Storage::delete('/public/uploads/img/' . $theme->video_src);
            Storage::delete('/public/uploads/pdf/' . $theme->pdf_src);
            $theme->delete();
            return response()->json([
                'status' => 'ok',
                'message' => 'theme deleted successfully'
            ], 200);
        } catch (\Exception $e) {
            return response()->json([
                'status' => 'error',
                'message' => 'error : ' . $e->getMessage()
            ], 401);
        }
    }
}
