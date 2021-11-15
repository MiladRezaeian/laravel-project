<?php

namespace App\Http\Controllers\Admin;

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

    public function create()
    {
        return view('admin.articles.create');
    }

    public function store()
    {
        $validation_data = $this->validate(request() , [
           'title' => 'required|min:10|max:50',
           'body' => 'required'
        ]);

        Article::create([
            'title' => $validation_data['title'],
            'slug' => $validation_data['title'],
            'body' => $validation_data['body'],
        ]);

        return redirect('/admin/articles/create');
    }

    public function edit($id)
    {
        $article = \App\Article::findOrFail($id);

        return view('admin.articles.edit' , [
            'article' => $article
        ]);
    }

    public function update($id)
    {
        $validate_data = $this->validate(request(),[
            'title' => 'required|min:10|max:50',
            'body' => 'required'
        ]);

        $article = Article::findOrFail($id);

        $article->update($validate_data);

        return back();
    }

    public function delete($id)
    {
        $article = Article::findOrFail($id);

        $article->delete();

        return back();
    }
}
