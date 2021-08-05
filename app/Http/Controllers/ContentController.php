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
}
