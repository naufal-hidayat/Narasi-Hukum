<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ConsultationController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\ArticleController;

// Route Beranda
Route::get('/', [HomeController::class, 'index'])->name('home');

// Login dan Register
Route::get('/login', function () {
    return view('auth.login');
})->name('login');

Route::post('/login', [AuthController::class, 'login']);

Route::get('/register', function () {
    return view('auth.register');
})->name('register');

Route::post('/register', [AuthController::class, 'register']);

Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

Route::get('/admin', [AdminController::class, 'dashboard'])->name('admin.dashboard');

    // CRUD Berita
    Route::get('/admin/news', [AdminController::class, 'indexNews'])->name('admin.news.index');
    Route::get('/admin/news/create', [AdminController::class, 'createNews'])->name('admin.news.create');
    Route::post('/admin/news', [AdminController::class, 'storeNews'])->name('admin.news.store');
    Route::get('/admin/news/{news}/edit', [AdminController::class, 'editNews'])->name('admin.news.edit');
    Route::put('/admin/news/{news}', [AdminController::class, 'updateNews'])->name('admin.news.update');
    Route::delete('/admin/news/{news}', [AdminController::class, 'destroyNews'])->name('admin.news.destroy');

    // CRUD Artikel
    Route::get('/admin/articles', [AdminController::class, 'indexArticles'])->name('admin.articles.index');
    Route::get('/admin/articles/create', [AdminController::class, 'createArticle'])->name('admin.createArticle');
    Route::get('/admin/articles/create', [AdminController::class, 'createArticle'])->name('admin.articles.create');
    Route::post('/admin/articles', [AdminController::class, 'storeArticle'])->name('admin.articles.store');
    Route::get('/admin/articles/{article}/edit', [AdminController::class, 'editArticle'])->name('admin.articles.edit');
    Route::put('/admin/articles/{article}', [AdminController::class, 'updateArticle'])->name('admin.articles.update');
    Route::delete('/admin/articles/{article}', [AdminController::class, 'destroyArticle'])->name('admin.articles.destroy');
Route::get('/admin/consultations', [AdminController::class, 'consultations'])->name('admin.consultations');
// Route Form Konsultasi
Route::get('/consultation', [ConsultationController::class, 'create'])->name('consultation.form');
Route::post('/consultation', [ConsultationController::class, 'store'])->name('consultation.store');

// Route untuk Berita
Route::get('/news', [NewsController::class, 'index'])->name('news.index');
Route::get('/news/{id}', [NewsController::class, 'show'])->name('news.show');

// Route untuk Artikel
Route::get('/articles', [ArticleController::class, 'index'])->name('articles.index');
Route::get('/articles/{id}', [ArticleController::class, 'show'])->name('articles.show');
