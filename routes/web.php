<?php

use App\Http\Controllers\ArticleController;
use App\Http\Controllers\ContentController;
use App\Http\Controllers\SettingController;
use Illuminate\Support\Facades\Route;

Route::get('/', [ArticleController::class, 'index'])->name('home');
Route::get('articles/{article:slug}', [ArticleController::class, 'show']);

Route::group(['middleware' => 'auth'], function () {
    Route::get('/dashboard', function () {
        return view('dashboard.main');
    })->name('dashboard');

    Route::view('admin/settings', 'dashboard.settings')->name('settings');
    Route::put('admin/settings', [SettingController::class, 'update'])->name('settings.update');

    Route::get('dashboard/content', [ContentController::class, 'index'])->name('content.index');
    Route::get('dashboard/content', [ContentController::class, 'store'])->name('content.store');
    Route::get('dashboard/content', [ContentController::class, 'update'])->name('content.update');
    Route::get('dashboard/content', [ContentController::class, 'destroy'])->name('content.destroy');

    Route::view('dashboard/accounts', 'dashboard.accounts')->name('accounts');
    Route::view('dashboard/newsletter', 'dashboard.newsletter')->name('newsletter');
});

require __DIR__ . '/auth.php';
