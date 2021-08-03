<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Tag;

class ArticleController extends Controller
{
    public function index()
    {
        return view('articles.index', [
            'articles' => Article::all()->sortBy('term'),
//                ->load('tag')
//                ->with(['term'])
//                ->filter(request(['term']))
//                ->paginate(10)
//                ->withQueryString()
            'tags' => Tag::all()
        ]);
//        if (request('tag')){
//            $articles = Tag::where('name', request('tag'))->firstOrFail()->articles;
//
//            return $articles;
//        } else {
//            $articles = Article::with('tag')->get();
//        }
//
//        return view('articles.index', compact('articles'));
    }

    public function show(Article $article)
    {
        return view('articles.single-article', [
            'article' => $article,
            'tags' => Tag::all()
        ]);
    }
}