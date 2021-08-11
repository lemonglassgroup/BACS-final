<?php

use App\Http\Controllers\AccountController;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\ContentController;
use App\Http\Controllers\SettingController;
use Illuminate\Support\Facades\Route;

Route::get('/', [ArticleController::class, 'index'])->name('home');
Route::get('articles/{article:slug}', [ArticleController::class, 'show']);

Route::get('/contact', [ContactController::class, 'index']);
Route::post('/contact', [ContactController::class, 'store'])->name('contact.store');

Route::group(['middleware' => 'auth'], function () {
    Route::get('/dashboard', function () {
        return view('dashboard.main');
    })->name('dashboard');

    Route::view('admin/settings', 'dashboard.settings')->name('settings');
    Route::put('admin/settings', [SettingController::class, 'update'])->name('settings.update');

    Route::get('dashboard/content', [ContentController::class, 'index'])->name('content.index');
    Route::get('dashboard/content/create', [ContentController::class, 'create'])->name('content.create');
    Route::post('dashboard/content', [ContentController::class, 'store'])->name('content.store');
    Route::get('dashboard/content/{article}/edit', [ContentController::class, 'edit'])->name('content.edit');
    Route::put('dashboard/content/{article}', [ContentController::class, 'update'])->name('content.update');
    Route::delete('dashboard/content/destroy/{article}', [ContentController::class, 'destroy'])->name('content.destroy');

    Route::get('dashboard/accounts', [AccountController::class, 'index'])->name('accounts.index');
    Route::get('dashboard/accounts/create', [AccountController::class, 'create'])->name('accounts.create');
    Route::post('dashboard/accounts', [AccountController::class, 'store'])->name('accounts.store');

    Route::view('dashboard/newsletter', 'dashboard.newsletter')->name('newsletter');
});

require __DIR__ . '/auth.php';
