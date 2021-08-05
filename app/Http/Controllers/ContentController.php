<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;

class ContentController extends Controller
{
    public function index()
    {
        return view('dashboard.content', [
            'articles' => Article::orderBy('term')->paginate(25),
        ]);
    }

    public function store()
    {
        //
    }

    public function edit(Article $article)
    {
        return view('dashboard.edit', [
            'article' => $article,
            'tag' => $article->tag,
        ]);
    }

    public function update(Article $article)
    {
        request()->validate([
            'term' => 'required',
            'excerpt' => 'required',
            'definition' => 'required',
        ]);

        $article->update([
            'term' => request('term'),
            'excerpt' => request('excerpt'),
            'definition' => request('definition'),
        ]);

        return redirect('dashboard/content')->with('success', 'Įrašas atnaujintas');
//        TODO success message
    }

    public function destroy(Article $article)
    {
        $article->delete();

        return redirect('dashboard/content')->with('success', 'Įrašas pašalintas');
//        TODO success message
    }
}
