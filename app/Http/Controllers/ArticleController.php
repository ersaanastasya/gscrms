<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
 use App\Models\Article;

class ArticleController extends Controller
{


public function index()
{
    $articles = Article::where('status', 'Published')
        ->latest()
        ->paginate(9);

    return view('articles.index', compact('articles'));
}

   public function show(Article $article)
{
    return view('articles.show', compact('article'));
}
}