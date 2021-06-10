<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Sinf;
use Barryvdh\DomPDF\Facade as PDF;
use Illuminate\Http\Request;

class SinfsController extends Controller
{
    public function __construct()
    {
        $this->middleware('isAdmin', ['except' => ['index']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sinfs = Sinf::all();
        return view('admin.classes.index', compact('sinfs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.classes.create');
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
            'label' => 'required|string',
            'status' => 'required|boolean'
        ]);

        $sinf = Sinf::create([
            'class' => $data['label'],
            'status' => $data['status']
        ]);

        if ($sinf) {
            alert()->success('Синф бо муваффақият илова шуд', 'Илова шуд');
            return redirect(route('sinfs.create'));
        }
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Sinf $sinf
     * @return \Illuminate\Http\Response
     */
    public function show(Sinf $sinf)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Sinf $sinf
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit(Sinf $sinf)
    {
        return view('admin.classes.edit', compact('sinf'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Sinf $sinf
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Sinf $sinf)
    {

        $data = $request->validate([
            'label' => 'required|string',
            'status' => 'required|boolean'
        ]);

        $sinf->update([
            'class' => $data['label'],
            'status' => $data['status']
        ]);

        alert()->success('Синф бо муваффақият ислоҳ шуд', 'Илова шуд');

        return redirect(route('sinfs.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Sinf $sinf
     * @return \Illuminate\Http\Response
     */
    public function destroy(Sinf $sinf)
    {
        try {
            $sinf->delete();
            return response()->json([
                'status' => 'ok',
                'message' => 'sinf deleted successfully'
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
        $user = Sinf::all();

        $data = [
            'title' => 'Рӯйхати Синфҳо',
            'users' => $user
        ];

        $pdf = PDF::loadView('admin.classes.pdf', $data);
        return $pdf->download('Рӯйхати синфҳо.pdf');
    }
}
