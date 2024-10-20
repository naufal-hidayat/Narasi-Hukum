<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\News;

class HomeController extends Controller
{
    public function index()
    {
        $articles = Article::latest()->take(5)->get();
        $news = News::latest()->take(3)->get();
        $headlines = Article::latest()->take(5)->get(); // Headline dari artikel

        return view('home', compact('articles', 'news', 'headlines'));
    }
}
