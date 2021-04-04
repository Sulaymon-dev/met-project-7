<?php

namespace App\Http\Controllers\Admin;

use App\Cluster;
use App\Http\Controllers\Controller;
use App\MMT;
use App\MmtFan;
use App\Subject;
use Illuminate\Http\Request;

class MmtsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $query = MMT::select();
        $role = auth()->user()->role;
        $query->with(['subject', 'cluster', 'mmt_fan']);
        $mmts = $query->latest()->paginate(25);
//        return $mmts;
        return view('admin.mmts.index', compact('mmts','role'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $subjects = Subject::all();
        $clusters = Cluster::all();
        $resources = MmtFan::all();
        return view('admin.mmts.create', compact('clusters', 'subjects','resources'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'subject_id' => 'required|numeric',
            'cluster_id' => 'required|numeric',
            'resource_id' => 'required|numeric',
            'status' => 'nullable|boolean',
            'component' => 'required|string',
        ]);

        $mmt = MMT::create([
            'subject_id' => $data['subject_id'],
            'cluster_id' => $data['cluster_id'],
            'mmt_fan_id' => $data['resource_id'],
            'status' => $data['status'],
            'component' => $data['component'],
        ]);

        if ($mmt) {
            alert()->success('Нақша бо муваффақият илова шуд', 'Илова шуд');
            return redirect(route('mmts.index'));
        }
        return abort(401);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\MMT  $mMT
     * @return \Illuminate\Http\Response
     */
    public function show(MMT $mMT)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param $id
     * @return \Illuminate\Http\Response
     */
    public function edit( $id)
    {
        $mMT = MMT::whereId($id)->first();
        $subjects = Subject::all();
        $clusters = Cluster::all();
        $resources = MmtFan::all();
        return view('admin.mmts.edit', compact('clusters', 'subjects','resources','mMT'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\MMT  $mMT
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $mMT = MMT::whereId($id)->first();
        $data = $request->validate([
            'subject_id' => 'required|numeric',
            'cluster_id' => 'required|numeric',
            'resource_id' => 'required|numeric',
            'status' => 'nullable|boolean',
            'component' => 'required|string',
        ]);

        $mMT->update([
            'subject_id' => $data['subject_id'],
            'cluster_id' => $data['cluster_id'],
            'mmt_fan_id' => $data['resource_id'],
            'status' => $data['status'],
            'component' => $data['component'],
        ]);

        alert()->success('Нақша бо муваффақият илова шуд', 'Илова шуд');
        return redirect(route('mmts.index'));

        return $request->all();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\MMT  $mMT
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $mMT = MMT::whereId($id)->first();
        try {
            $mMT->delete();
            return response()->json([
                'status' => 'ok',
                'message' => 'plan deleted successfully'
            ], 200);
        } catch (\Exception $e) {
            return response()->json([
                'status' => 'error',
                'message' => 'error : ' . $e->getMessage()
            ], 401);
        }
    }
}
