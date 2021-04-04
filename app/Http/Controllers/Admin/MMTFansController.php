<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\MmtFan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class MMTFansController extends Controller
{

    public function __construct()
    {
        $this->authorizeResource(MmtFan::class, 'mmt_fan');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $query = MmtFan::select();
        $role = auth()->user()->role;
        if ($role == 'teacher') {
            $query->whereUserId(auth()->id());
        }
        $books = $query->latest()->paginate(25);
        return view('admin.mmt_fans.index', compact('books'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.mmt_fans.create_mmt_fans');
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
            'title' => 'required|string',
            'status' => 'nullable|boolean',
            'is_show' => 'nullable|boolean',
            'pdf' => 'required|file'
        ]);

        if (auth()->user()->role == 'teacher') $data['status'] = '0';

        $book = MmtFan::create([
            'title' => $data['title'],
            'status' => $data['status'],
            'is_show' => $data['is_show'],
            'user_id' => auth()->id(),
            'pdf_src' => str_replace('public/uploads/pdf/', '', Storage::putFile('public/uploads/pdf', $request->file('pdf')))
        ]);

        if ($book) {
            alert()->success('Китоб бо муваффақият ислоҳ шуд', 'Ислоҳ шуд');
            return redirect(route('mmt_fans.index'));
        }
    }

    /**
     * Display the specified resource.
     *
     * @param \App\MmtFan $mmtFan
     * @return \Illuminate\Http\Response
     */
    public function show(MmtFan $mmtFan)
    {
        return $mmtFan;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\MmtFan $mmtFan
     * @return \Illuminate\Http\Response
     */
    public function edit(MmtFan $mmtFan)
    {
        $role = auth()->user()->role;
        return view('admin.mmt_fans.edit_mmt_fans', compact('mmtFan', 'role'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\MmtFan $mmtFan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, MmtFan $mmtFan)
    {
        if ($request->input('isOnlyTestUpdate') && auth()->user()->role != 'moderator') {
            $mmtFan->test = $request->input('data');
            $mmtFan->save();
            return response(['status' => 'ok'], 200);
        }
        $isUpdatedSuccessfully = false;
        if (auth()->user()->role == 'moderator') {
            if ($mmtFan->update([
                    'status' => $request->validate([
                        'status' => 'required|boolean'
                    ])['status']
                ]
            )) $isUpdatedSuccessfully = true;

        } else {
            $data = $request->validate([
                'title' => 'required|string',
                'status' => 'nullable|boolean',
                'is_show' => 'nullable|boolean',
                'pdf' => 'nullable|file',
                'saveOldPdf' => 'nullable|boolean'
            ]);

            if (auth()->user()->role == 'teacher') $data['status'] = $mmtFan->status;

            $pdf = $request->file('pdf');

            if (isset($data['saveOldPdf']) && $data['saveOldPdf'] == '1') {
                $data['pdf_src'] = $mmtFan->pdf_src;
            } elseif (!isset($pdf)) {
                $data['pdf_src'] = null;
            } else {
                $data['pdf_src'] = str_replace('public/uploads/pdf/', '', Storage::putFile('public/uploads/pdf', $pdf));
                Storage::delete('/public/uploads/pdf/' . $mmtFan->pdf_src);
            }

            if ($mmtFan->update($data)) $isUpdatedSuccessfully = true;
        }

        if ($isUpdatedSuccessfully) {
            alert()->success('Китоб бо муваффақият ислоҳ шуд', 'Ислоҳ шуд');
            return redirect(route('mmt_fans.index'));
        }
        alert()->success('Хатогӣ рӯй додааст', 'Хатогӣ');

    }

    public function showQuiz4in1()
    {
        $role = auth()->user()->role;
        $mmt_fans = MmtFan::select('id', 'user_id', 'title');
        if ($role == 'teacher')
            $mmt_fans->where('user_id', '=', auth()->user()->id);
        $mmt_resource = $mmt_fans->get();

        return view('admin.mmt_fans.test_4in1', compact('role', 'mmt_resource'));
    }

    public function showMatching()
    {
        $role = auth()->user()->role;
        $mmt_fans = MmtFan::select('id', 'user_id', 'title');
        if ($role == 'teacher')
            $mmt_fans->where('user_id', '=', auth()->user()->id);
        $mmt_resource = $mmt_fans->get();
        return view('admin.mmt_fans.test_match', compact('role', 'mmt_resource'));
    }

    public function showJson()
    {
        $role = auth()->user()->role;
        $mmt_fans = MmtFan::select('id', 'user_id', 'title');
        if ($role == 'teacher')
            $mmt_fans->where('user_id', '=', auth()->user()->id);
        $mmt_resource = $mmt_fans->get();
        return view('admin.mmt_fans.test_json', compact('role','mmt_resource'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\MmtFan $mmtFan
     * @return \Illuminate\Http\Response
     */
    public function destroy(MmtFan $mmtFan)
    {
        try {
            Storage::delete('/public/uploads/pdf/' . $mmtFan->pdf_src);
            $mmtFan->delete();
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
