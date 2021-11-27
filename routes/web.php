<?php

namespace App\Http\controllers;

use App\Http\Controllers\Admin\ArticleController;
use App\Models\Article;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Validator;

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

Route::get('/', [HomeController::class , 'home']);
Route::get('/articles/{articleSlug}' , [ArticleController::class , 'single']);
Route::get('/about', [HomeController::class , 'about']);
Route::get('/contact', [HomeController::class , 'contact']);

Route::prefix('admin')->namespace('Admin')->group(function() {
    Route::get('/articles' , [ArticleController::class , 'index']);
    Route::get('/articles/create' , [ArticleController::class , 'create']);
    Route::post('/articles/create', [ArticleController::class , 'store']);
    Route::get('/articles/{article}/edit' , [ArticleController::class , 'edit']);
    Route::put('/articles/{article}/edit' , [ArticleController::class , 'update']);
    Route::delete('/articles/{article}' , [ArticleController::class , 'delete']);

});

