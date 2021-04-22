<?php

namespace App\Http\Controllers\Admin;

use App\Article;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ArticlesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $query = Article::select();
        $role = auth()->user()->role;
        if ($role == 'admin') {
            $query->whereUserId(auth()->id());
        }

        $articles = $query->with('user')->latest()->paginate('25');
        return view('admin.news.index', compact('articles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.news.create');
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
            'description' => 'string',
            'body' => 'nullable',
            'image' => 'nullable|file',
            'status' => 'required|boolean'
        ]);

        $article = Article::create([
            'user_id' => auth()->id(),
            'title' => $data['title'],
            'description' => $data['description'] ?? '',
            'body' => $data['body'] ?? '',
            'status' => $data['status'],
            'img_src' => str_replace('public/uploads/img/', '', Storage::putFile('public/uploads/img', $request->file('image'))),
        ]);

        if ($article) {
            alert()->success('Хабар бо муваффақият илова шуд', 'Илова шуд');
            return redirect(route('news.index'));
        }

        return abort('403');
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Article $article
     * @return \Illuminate\Http\Response
     */
    public function show(Article $article)
    {
        return $article;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Article $article
     * @return \Illuminate\Http\Response
     */
    public function edit($article_id)
    {
        $article = Article::where('id', '=', $article_id)->first();
        if (auth()->user()->role == 'superadmin' || auth()->id() == $article->user()) {
            return view('admin.news.edit', compact('article'));
        }
        return abort(404);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Article $article
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,  $article_id)
    {

        $article = Article::where('id', '=', $article_id)->first();

        $data = $request->validate([
            'title' => 'required|string',
            'description' => 'string',
            'body' => 'nullable',
            'image' => 'nullable|file',
            'status' => 'required|boolean',
            'saveOldImage' => 'nullable|boolean'
        ]);

        $img = $request->file('image');

        if (isset($data['saveOldImage']) && $data['saveOldImage'] == '1') {
            $data['img_src'] = $article->img_src;
        } elseif (!isset($img)) {
            $data['img_src'] = null;
        } else {
            $data['img_src'] = str_replace('public/uploads/img/', '', Storage::putFile('public/uploads/img', $img));
            Storage::delete('/public/uploads/img/' . $article->img_src);
        }

        if ($article->update($data)){
            alert()->success('Навгонӣ бо муваффақият ислоҳ шуд', 'Ислоҳ шуд');
            return redirect(route('news.index'));
        }

        return abort(419);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Article $article
     * @return \Illuminate\Http\Response
     */
    public function destroy(Article $article)
    {
        try {
            Storage::delete('/public/uploads/img/' . $article->img_src);
            $article->delete();
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
