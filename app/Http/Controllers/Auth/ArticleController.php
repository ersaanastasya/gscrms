<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
    public function index(Request $request)
    {
        $query = Article::where('status', 'Published');

        if ($request->filled('search')) {
            $query->where('title', 'like', '%' . $request->search . '%');
        }

        $articles = $query
            ->orderByDesc('published_at')
            ->paginate(9)
            ->withQueryString();

        return view('articles.index', compact('articles'));
    }

    public function show(Article $article)
    {
        abort_if($article->status !== 'Published', 404);

        return view('articles.show', compact('article'));
    }
}