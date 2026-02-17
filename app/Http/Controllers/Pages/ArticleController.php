<?php

namespace App\Http\Controllers\Pages;

use App\Http\Controllers\Controller;
use App\Models\Pages\Article;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
    public function index(Request $request)
    {
        $perPage = $request->get('perPage', 10);

        if ($perPage == 'all') {
            $articles = Article::latest()->get();
        } else {
            $articles = Article::latest()->paginate((int)$perPage)->withQueryString();
        }

        return view('pages.articles.index', compact('articles', 'perPage'));
    }

    public function show($slug)
    {
        $article = Article::where('slug', $slug)->firstOrFail();
        return view('pages.articles.show', compact('article'));
    }
}
