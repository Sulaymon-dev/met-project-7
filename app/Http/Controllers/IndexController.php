<?php

namespace App\Http\Controllers;

use App\Setting;
use App\Theme;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $news = (new NewsController)->getNews();
        $mainSliderQuery = Setting::where('key', '=', 'main_slider')->first();
        if ($mainSliderQuery) {
            $mainSliderSlides = collect(json_decode($mainSliderQuery->value))['slides'];
        } else {
            $mainSliderSlides = [];
        }
        $secondSliderQuery = Setting::where('key', '=', 'second_slider')->first();
        if ($secondSliderQuery) {
            $secondSliderSlides = collect(json_decode($secondSliderQuery->value));
        } else {
            $secondSliderSlides = [];
        }
        return view('front.pages.index', compact('news', 'mainSliderSlides', 'secondSliderSlides'));
    }

    public function search(Request $request)
    {
        $text = $request->get('text');
        $result = Theme::where('name', 'like', '%' . $text . '%')->with('plan.subject')->get(['id', 'theme_num', 'name', 'plan_id']);
        $resultCount = count($result);
        return view('front.pages.search', compact(['result', 'resultCount', 'text']));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
