<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Page;
use FontLib\Table\Type\post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PagesController extends Controller
{


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pages = Page::with('user')->latest()->paginate('25');
        return view('admin.pages.index', compact('pages'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.pages.create');
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
            'title' => 'required|string',
            'short_title' => 'required|string',
            'body' => 'nullable',
            'image' => 'nullable|file',
            'status' => 'required|boolean'
        ]);

        $page = Page::create([
            'user_id' => auth()->id(),
            'title' => $data['title'],
            'short_title' => $data['short_title'] ?? '',
            'body' => $data['body'] ?? '',
            'status' => $data['status'],
            'img_src' => $request->has('image') ? str_replace('public/uploads/img/', '', Storage::putFile('public/uploads/img', $request->file('image'))) : null,
        ]);

        if ($page) {
            alert()->success('Саҳифа бо муваффақият илова шуд. ', 'Илова шуд');
            return redirect(route('pages.index'));
        }

        return abort('403');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Page  $page
     * @return \Illuminate\Http\Response
     */
    public function show(Page $page)
    {
        return $page;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Page  $page
     * @return \Illuminate\Http\Response
     */
    public function edit(Page $page)
    {
        return view('admin.pages.edit',compact('page'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Page  $page
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Page $page)
    {
        $data = $request->validate([
            'title' => 'required|string',
            'short_title' => 'required|string',
            'body' => 'nullable',
            'image' => 'nullable|file',
            'status' => 'required|boolean',
            'saveOldImage' => 'nullable|boolean'
        ]);

        $img = $request->file('image');

        if (isset($data['saveOldImage']) && $data['saveOldImage'] == '1') {
            $data['img_src'] = $page->img_src;
        } elseif (!isset($img)) {
            $data['img_src'] = null;
        } else {
            $data['img_src'] = str_replace('public/uploads/img/', '', Storage::putFile('public/uploads/img', $img));
            Storage::delete('/public/uploads/img/' . $page->img_src);
        }

        if ($page->update($data)){
            alert()->success('Саҳифа бо муваффақият ислоҳ шуд', 'Ислоҳ шуд');
            return redirect(route('pages.index'));
        }

        return abort(419);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Page  $page
     * @return \Illuminate\Http\Response
     */
    public function destroy(Page $page)
    {
        try {
            Storage::delete('/public/uploads/img/' . $page->img_src);
            $page->delete();
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
