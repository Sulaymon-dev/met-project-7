<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Olympic;
use App\Sinf;
use App\Subject;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class OlympicsController extends Controller
{
    public function __construct()
    {
        $this->authorizeResource(Olympic::class);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $query = Olympic::select();
        $role = auth()->user()->role;
//        if ($role == 'teacher') {
//            $query->whereUserId(auth()->id());
//        }
        $olympics = $query->with(['subject', 'sinf'])->latest()->paginate(25);

        return view('admin.olympics.index', compact('olympics', 'role'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $sinfs = Sinf::all();
        $subjects = Subject::all();
        return view('admin.olympics.create', compact('sinfs', 'subjects'));
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
            'sinf_id' => 'required|numeric',
            'subject_id' => 'required|numeric',
            'title' => 'required',
            'introduction' => 'nullable',
            'img' => 'nullable|file',
            'pdf' => 'nullable|file',
            'status' => 'nullable|boolean',
            'is_show' => 'required|boolean',
        ]);

        $olympic = new Olympic;
        $olympic->user_id = auth()->id();
        $olympic->sinf_id = $data['sinf_id'];
        $olympic->subject_id = $data['subject_id'];
        $olympic->title = $data['title'];
        $olympic->introduction = $data['introduction'] ?? "";
        $olympic->status = $data['status'];
        $olympic->is_show = $data['is_show'];

        if (isset($data['img']))
            $olympic->img_src = str_replace('public/uploads/img/', '', Storage::putFile('public/uploads/img', $request->file('img')));
        if (isset($data['pdf']))
            $olympic->pdf_src = str_replace('public/uploads/pdf/', '', Storage::putFile('public/uploads/pdf', $request->file('pdf')));

        $olympic->save();

        if ($olympic) {
            alert()->success('Маводи олимпиадавӣ бо муваффакият изофа шуд', 'Илова шуд');
            return redirect(route('olympics.index'));
        }

        return abort(419);
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Olympic $olympic
     * @return \Illuminate\Http\Response
     */
    public function show(Olympic $olympic)
    {
        return $olympic;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Olympic $olympic
     * @return \Illuminate\Http\Response
     */
    public function edit(Olympic $olympic)
    {
        $sinfs = Sinf::all();
        $subjects = Subject::all();
        $role = auth()->user()->role;
        return view('admin.olympics.edit', compact('sinfs', 'subjects', 'olympic', 'role'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Olympic $olympic
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Olympic $olympic)
    {
        if ($request->input('isOnlyTestUpdate') && auth()->user()->role != 'moderator') {
            $olympic->test = $request->input('data');
            $olympic->save();
            return response(['status' => 'ok'], 200);
        }

        if (auth()->user()->role == 'moderator') {
            $status = $request->validate([
                'status' => 'required|boolean'
            ])['status'];
            $olympic->status = $status;
            $olympic->save();
            $isUpdatedSuccessfully = true;
        }else{
            $data = $request->validate([
                'sinf_id' => 'required|numeric',
                'subject_id' => 'required|numeric',
                'title' => 'required',
                'introduction' => 'nullable',
                'img' => 'nullable|file',
                'pdf' => 'nullable|file',
                'status' => 'nullable|boolean',
                'is_show' => 'required|boolean',
                'saveOldPdf' => 'nullable|boolean',
                'saveOldImg' => 'nullable|boolean',
            ]);

            if (auth()->user()->role == 'teacher') $data['status'] = $olympic->status;
            $olympic->subject_id = $data['subject_id'];
            $olympic->sinf_id = $data['sinf_id'];
            $olympic->title = $data['title'];
            $olympic->is_show = $data['is_show'] ?? 0;
            $olympic->status = $data['status'] ?? 0;
            $olympic->introduction = $data['introduction'] ?? null;

            $pdf = $request->file('pdf');
            $img = $request->file('img');

            $img_src ='';
            if (isset($data['saveOldImg']) && $data['saveOldImg'] == '1') {
                $img_src= $olympic->img_src;
            } elseif (!isset($img)) {
                $img_src= null;
            } else {
                $img_src= str_replace('public/uploads/img/', '', Storage::putFile('public/uploads/img', $img));
                Storage::delete('/public/uploads/img/' . $olympic->img_src);
            }
            $pdf_src = '';

            if (isset($data['saveOldPdf']) && $data['saveOldPdf'] == '1') {
                $pdf_src = $olympic->pdf_src;
            } elseif (!isset($pdf)) {
                $pdf_src = null;
            } else {
                $pdf_src= str_replace('public/uploads/pdf/', '', Storage::putFile('public/uploads/pdf', $pdf));
                Storage::delete('/public/uploads/pdf/' . $olympic->pdf_src);
            }
            $olympic->img_src = $img_src;
            $olympic->pdf_src = $pdf_src;
            if ($olympic->save()) $isUpdatedSuccessfully = true;

        }
        if ($isUpdatedSuccessfully) {
            alert()->success('Маводи олимпиадавӣ бо муваффакият тағйир дода шуд', 'Тағйир ёфт');
            return redirect(route('olympics.index'));
        }
        return abort(403);
    }

    public function showQuiz4in1()
    {
        $role = auth()->user()->role;
        $mmt_fans = Olympic::select('id', 'user_id', 'title');
        if ($role == 'teacher')
            $mmt_fans->where('user_id', '=', auth()->user()->id);
        $resource = $mmt_fans->get();

        return view('admin.olympics.test_4in1', compact('role', 'resource'));
    }

    public function showMatching()
    {
        $role = auth()->user()->role;
        $mmt_fans = Olympic::select('id', 'user_id', 'title');
        if ($role == 'teacher')
            $mmt_fans->where('user_id', '=', auth()->user()->id);
        $resource = $mmt_fans->get();
        return view('admin.olympics.test_match', compact('role', 'resource'));
    }

    public function showJson()
    {
        $role = auth()->user()->role;
        $mmt_fans = Olympic::select('id', 'user_id', 'title');
        if ($role == 'teacher')
            $mmt_fans->where('user_id', '=', auth()->user()->id);
        $resource = $mmt_fans->get();
        return view('admin.olympics.test_json', compact('role','resource'));
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Olympic $olympic
     * @return \Illuminate\Http\Response
     */
    public function destroy(Olympic $olympic)
    {
        try {
            Storage::delete('/public/uploads/img/' . $olympic->img_src);
            Storage::delete('/public/uploads/pdf/' . $olympic->pdf_src);
            $olympic->delete();
            return response()->json([
                'status' => 'ok',
                'message' => 'book deleted successfully'
            ], 200);
        } catch (\Exception $e) {
            return response()->json([
                'status' => 'error',
                'message' => 'error : ' . $e->getMessage()
            ], 401);
        }
    }
}
