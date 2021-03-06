<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\ArticleRequest;
use App\Models\Article;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
    public function index()
    {
        return view('admin.articles.index' , [
            'articles' => Article::all()
        ]);
    }

    public function single()
    {
        return view('admin.articles.single');
    }

    public function create()
    {
        return view('admin.articles.create');
    }

    public function store(ArticleRequest $request)
    {
        $validation_data = $request->validated();

        Article::create([
            'title' => $validation_data['title'],
            'slug' => $validation_data['title'],
            'body' => $validation_data['body'],
        ]);

        return redirect('/admin/articles/create');
    }

    public function edit(Article $article)
    {
        return view('admin.articles.edit' , [
            'article' => $article
        ]);
    }

    public function update(ArticleRequest $request, Article $article)
    {
        $validation_data = $request->validated();

        $article->update($validation_data);

        return back();
    }

    public function delete(Article $article)
    {
        $article->delete();

        return back();
    }
}
