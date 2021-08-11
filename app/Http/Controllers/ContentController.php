<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Tag;

class ContentController extends Controller
{
    public function index()
    {
        return view('dashboard.content', [
            'articles' => Article::orderBy('term')->paginate(25),
        ]);
    }

    public function create()
    {
        return view('dashboard.create');
    }

    public function store()
    {
        request()->validate([
            'term'       => 'required',
            'slug'       => 'required',
            //            TODO add tag validation
            'excerpt'    => 'required',
            'definition' => 'required',
        ]);

        $tag = Tag::create([
            'name' => request('tag'),
            'slug' => request('tag'),
        ]);

        $article = Article::create([
            'term'       => request('term'),
            'slug'       => request('slug'),
            //            TODO tag creation
            'excerpt'    => request('excerpt'),
            'definition' => request('definition'),
        ]);

//        $article->save();
        $article->tag()->attach($tag);


        return redirect('dashboard/content')->with('success', 'Įrašas atnaujintas');
//        TODO success message
    }

    public function edit(Article $article)
    {
        return view('dashboard.edit', [
            'article' => $article,
            'tag'     => $article->tag,
        ]);
    }

    public function update(Article $article)
    {
        request()->validate([
            'term'       => 'required',
            //            TODO add tag validation
            'excerpt'    => 'required',
            'definition' => 'required',
        ]);

        $article->update([
            'term'       => request('term'),
            'excerpt'    => request('excerpt'),
            'definition' => request('definition'),
        ]);

        return redirect('dashboard/content')->with('success', 'Įrašas atnaujintas');
//        TODO success message
    }

    public function destroy(Article $article)
    {
        $this->authorize('content_delete');

        $article->delete();

        return redirect('dashboard/content')->with('success', 'Įrašas pašalintas');
//        TODO success message
    }
}
