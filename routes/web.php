<?php

namespace App\Http\controllers;

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

Route::get('/', 'HomeController@home');
Route::get('/about', 'HomeController@about');
Route::get('/contact', 'HomeController@contact');

Route::prefix('admin')->namespace('Admin')->group(function() {
    Route::get('/articles' , 'ArticleController@index');
    Route::get('/articles/create' , [ArticleController::class , 'create']);
    Route::post('/articles/create', [ArticleController::class , 'store']);
    Route::get('/articles/{id}/edit' , 'ArticleController@edit');
    Route::put('/articles/{id}/edit' , 'ArticleController@update');
    Route::delete('/articles/{id}' , 'ArticleController@delete');

});

