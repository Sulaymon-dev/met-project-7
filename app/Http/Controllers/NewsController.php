<?php

namespace App\Http\Controllers;

use App\Article;
use Illuminate\Http\Request;

class NewsController extends Controller
{

    public function getNews()
    {
        $news = Article::select('id', 'title', 'description', 'img_src', 'status', 'created_at', 'updated_at')
            ->where('status', '=', '1')
            ->orderBy('id', 'desc')
            ->limit(3)
            ->get();
        return $news;
    }

    public function getAllNews()
    {
        $news = Article::select('id', 'title', 'description', 'img_src', 'status', 'created_at', 'updated_at')
            ->where('status', '=', '1')
            ->latest()
            ->get();
        return $news;
    }

    public function getNewById(Request $request, $id)
    {

//        $new_id = $request->query('id');
        $data = Article::where([['id', '=', $id], ['status', '=', '1']])->first();
        return view('front.pages.info', compact('data'));    }
}
