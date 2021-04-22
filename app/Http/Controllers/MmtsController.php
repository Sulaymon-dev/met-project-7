<?php

namespace App\Http\Controllers;

use App\Cluster;
use App\MMT;
use Illuminate\Http\Request;

class MmtsController extends Controller
{
    public function index(Request $request)
    {
        ($request->query('cluster')) ? $cluster = (int)$request->query('cluster') : $cluster = 1;
        $clusters = Cluster::where('status', 1)->with('mmts.subject')->get()->sortBy("index");
        $first = false;
        $data=[];
        return view('front.pages.mmt', compact(['clusters', 'cluster','first', 'data']));
    }

    public function show($id, Request $request)
    {
        $mmt = MMT::where('id', $id)->with(['mmt_fan','subject'])->first();
        $test = null;
        if (!empty($mmt->mmt_fan->test)) {
            $test = json_decode($mmt->mmt_fan->test, true);
        }
        return view('front.pages.mmt_info', compact(['mmt', 'test']));
    }
}
