<?php

namespace App\Http\Controllers;

use App\Models\News;

class NewsController extends Controller
{
    public function index()
    {
        $news = News::latest()->get(); // Pagination dengan 5 berita per halaman
        return view('news.index', compact('news'));
    }

    public function show($id)
    {
        $newsItem = News::findOrFail($id);
        $relatedNews = News::where('id', '!=', $id)->latest()->get();

        return view('news.show', compact('newsItem', 'relatedNews'));
    }
}
