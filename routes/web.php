<?php

use App\Http\Controllers\ArticleController;
use App\Http\Controllers\SettingController;
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

Route::group(['middleware' => 'auth'], function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    Route::view('admin/settings', 'dashboard.settings')->name('settings');
    Route::put('admin/settings', [SettingController::class, 'update'])->name('settings.update');
    Route::view('dashboard/accounts', 'dashboard.accounts')->name('accounts');
    Route::view('dashboard/content', 'dashboard.content')->name('content');
    Route::view('dashboard/newsletter', 'dashboard.newsletter')->name('newsletter');
});

//Route::get('/cms', function () {
//    return view('dashboard.cms');
//})->middleware(['auth'])->name('content');

require __DIR__ . '/auth.php';
