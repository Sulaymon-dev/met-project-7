<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Subject;
use Barryvdh\DomPDF\Facade as PDF;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Intervention\Image\Facades\Image;


class SubjectsController extends Controller
{


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
//        $subjects = Subject::get();
        $subjects = Subject::latest()->paginate(10);
//        dd($subjects);
        return view('admin.subjects.index', compact('subjects'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.subjects.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string',
            'status' => 'required|boolean',
            'image_src' => 'nullable|file'
        ]);

        try {
            $image = $request->file('image_src');
            if (!isset($image)) {
                $data['image_src'] = null;
            } else {
                $now = Carbon::now();
                $filePath = Str::random(5) . '-' . $now->year . '-' . $now->month . '-' . $now->day . '.' . $request->file('image_src')->getClientOriginalExtension();
                $img = Image::make($image)->stream();
                Storage::disk('public')->put('/uploads/img/' . $filePath, $img);
            }
        } catch (\Exception $error) {
            $filePath = null;
        }

        $data['image_src'] = $filePath;

        if (Subject::create($data)) {
            alert()->success('Фан бо муваффақият илова шуд', 'Илова шуд');
            return redirect(route('subjects.create'));
        }
    }

    /**
     * Display the specified resource.
     *
     * @param Subject $subject
     * @return void
     */
    public function show(Subject $subject)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Subject $subject
     * @return \Illuminate\Http\Response
     */
    public function edit(Subject $subject)
    {
//        return  $subject;
        return view('admin.subjects.edit', compact('subject'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param Subject $subject
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Subject $subject)
    {
        $data = $request->validate([
            'name' => 'required|string',
            'status' => 'required|boolean',
            'image_src' => 'nullable|file'
        ]);


        try {
            $image = $request->file('image_src');
            if (!isset($image)) {
                $data['image_src'] = null;
            } else {
                $now = Carbon::now();
                $filePath = Str::random(5) . '-' . $now->year . '-' . $now->month . '-' . $now->day . '.' . $request->file('image_src')->getClientOriginalExtension();
                $img = Image::make($image)->stream();
                Storage::disk('public')->put('/uploads/img/' . $filePath, $img);
                $data['image_src'] = $filePath;
                Storage::disk('public')->delete('/uploads/img/' . $subject->image_src);
            }
        } catch (\Exception $error) {
            $data['image_src'] = $subject->images;
        }

        if ($subject->update($data)) {
            alert()->success('Фан бо муваффақият ислоҳ шуд', 'Ислоҳ шуд');
            return redirect(route('subjects.index'));
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Subject $subject
     * @return \Illuminate\Http\Response
     */
    public function destroy(Subject $subject)
    {
        try {
            $subject->delete();
            return response()->json([
                'status' => 'ok',
                'message' => 'subject deleted successfully'
            ], 200);
        } catch (\Exception $e) {
            return response()->json([
                'status' => 'error',
                'message' => 'error : ' . $e->getMessage()
            ], 401);
        }

    }

    public function makePdf()
    {
        $subjects = Subject::all();

        $data = [
            'title' => 'Рӯйхати Фанҳо',
            'subjects' => $subjects
        ];

        $pdf = PDF::loadView('admin.subjects.pdf', $data);
        return $pdf->download('фанҳо.pdf');
    }
}
