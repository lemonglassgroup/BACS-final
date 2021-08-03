<?php

use App\Http\Controllers\ArticleController;
use App\Models\Tag;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

//Route::get('/', function () {
//    return view('welcome');
//});

Route::get('/', [ArticleController::class, 'index'])->name('home');
Route::get('articles/{article:slug}', [ArticleController::class, 'show']);
Route::get('tags/{tag:slug}', function (Tag $tag) {
    return view('articles.index', [
        'articles' => $tag->articles,
        'currentTag' => $tag,
        'tags' => Tag::all()
    ]);
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__ . '/auth.php';
