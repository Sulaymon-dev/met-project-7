<?php

namespace App\Http\Controllers\Admin;

use App\Cluster;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ClustersController extends Controller
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
        $clusters = Cluster::all();
        return view('admin.clusters.index', compact('clusters'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.clusters.create');
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
            'index' => 'required|numeric',
            'name' => 'required|string',
            'status' => 'required|boolean'
        ]);

        $cluster = Cluster::create([
            'index' => $data['index'],
            'name' => $data['name'],
            'status' => $data['status']
        ]);

        if ($cluster) {
            alert()->success('Кластери нав бо муваффақият илова шуд', 'Илова шуд');
            return redirect(route('clusters.index'));
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Cluster  $cluster
     * @return \Illuminate\Http\Response
     */
    public function show(Cluster $cluster)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Cluster  $cluster
     * @return \Illuminate\Http\Response
     */
    public function edit(Cluster $cluster)
    {
        return view('admin.clusters.edit', compact('cluster'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Cluster  $cluster
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Cluster $cluster)
    {
        $data = $request->validate([
            'index' => 'required|numeric',
            'name' => 'required|string',
            'status' => 'required|boolean'
        ]);

        $cluster->update([
            'index' => $data['index'],
            'name' => $data['name'],
            'status' => $data['status']
        ]);

        alert()->success('Кластер бо муваффақият ислоҳ шуд', 'Ислоҳ шуд');

        return redirect(route('clusters.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Cluster  $cluster
     * @return \Illuminate\Http\Response
     */
    public function destroy(Cluster $cluster)
    {
        try {
            $cluster->delete();
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
}
