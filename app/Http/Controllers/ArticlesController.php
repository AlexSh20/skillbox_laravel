<?php

namespace App\Http\Controllers;

use App\Models\Article;
use function Webmozart\Assert\Tests\StaticAnalysis\resource;
use App\Services\FormRequest;

class ArticlesController extends Controller
{


    public function index()
    {
        $title = "Главная страница";
        $articles = Article::published()->get();
        return view('articles.index', compact('title', 'articles'));
    }

    public function create()
    {
        $title = "Добавление статьи";
        return view('articles.create', compact('title'));
    }

    public function store()
    {
        $request = new FormRequest;
        Article::create($request->validate());
        return redirect()->route('main');

    }

    public function show(Article $slug)
    {
        $title = "Статья";
        return view('articles.show', compact('title', 'slug'));
    }

    public function edit(Article $slug)
    {
        $title = "Редактирование статьи";
        return view('articles.edit', compact('title', 'slug'));
    }

    public function update(Article $slug)
    {
        $request = new FormRequest;
        $slug->update($request->validate());
        return redirect()->route('main');
    }

    public function destroy(Article $slug)
    {
        $slug->delete();
        return redirect()->route('main');
    }


}
