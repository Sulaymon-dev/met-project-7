<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Setting;
use Illuminate\Http\Request;

class SettingsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param Request $request
     * @return \Illuminate\Http\Response
     */

    public function index(Request $request)
    {
        $setting_field = $request->input('key');
        if (!isset($setting_field)){
            return view('admin.settings.index');
        }
        switch ($setting_field){
            case 'main_slider':
                return view('admin.settings.main_slider');
            case 'second_slider':
                return view('admin.settings.second_slider');

        }
        return view('admin.settings.index');
    }

    public function get_key_data($key)
    {
        switch ($key) {
            case 'main_slider':
                return $this->get_main_slider();
            case 'second_slider':
                return $this->get_second_slider();
        }
        return response()->json(['data' => 'key not found'], 200);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function get_main_slider()
    {
        return Setting::where('key', '=', 'main_slider')->first();
    }
    public function get_second_slider()
    {
        return Setting::where('key', '=', 'second_slider')->first();
    }


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
     * @param \App\Setting $setting
     * @return \Illuminate\Http\Response
     */
    public function show(Setting $setting)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Setting $setting
     * @return \Illuminate\Http\Response
     */
    public function edit(Setting $setting)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Setting $setting
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Setting $setting)
    {
        $setting->update(['value' => $request->input('data')]);
        return response([
            'data' => $setting,
            'status' =>'ok'
        ],200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Setting $setting
     * @return \Illuminate\Http\Response
     */
    public function destroy(Setting $setting)
    {
        //
    }
}
