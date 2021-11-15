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

Route::get('/', [HomeController::class , 'home']);
Route::get('/about', 'HomeController@about');
Route::get('/contact', 'HomeController@home');

Route::prefix('admin')->group(function () {
    Route::get('articles' , 'Admin\ArticleController@index');


    Route::get('/articles/create' , function () {
        return view('admin.articles.create');
    });
    Route::post('/articles/create', function (Request $request){

        Article::create([
            'title' => request('title'),
            'slug'  => request('title'),
            'body'  => request('body'),
        ]);

        return redirect('admin.articles.create');

    });



});
