<?php

namespace App\Http\Controllers;

use App\Models\Article;

class ArticleController extends Controller
{
    public function index()
    {
        $articles = Article::latest()->get(); 
        return view('articles.index', compact('articles'));
    }

    public function show($id)
    {
        $article = Article::findOrFail($id);

        $relatedArticles = Article::where('id', '!=', $id)->latest()->get();

        return view('articles.show', compact('article', 'relatedArticles'));
    }
}
