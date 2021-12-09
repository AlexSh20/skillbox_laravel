<?php

namespace App\Http\Controllers;

use App\Http\Requests\NewArticleRequest;
use App\Http\Requests\UpdateArticleRequest;
use App\Models\Article;
use function Webmozart\Assert\Tests\StaticAnalysis\resource;

class ArticlesController extends Controller
{
    public function index()
    {
        $articles = Article::published()->get();
        return view('articles.index', compact( 'articles'));
    }

    public function create()
    {
        return view('articles.create');
    }

    public function store(NewArticleRequest $request)
    {
        Article::create($request->rules());
        return redirect()->route('main');
    }

    public function show(Article $slug)
    {
        return view('articles.show', compact( 'slug'));
    }

    public function edit(Article $slug)
    {
        return view('articles.edit', compact( 'slug'));
    }

    public function update(Article $slug, UpdateArticleRequest $request)
    {
        $slug->update($request->rules());
        return redirect()->route('main');
    }

    public function destroy(Article $slug)
    {
        $slug->delete();
        return redirect()->route('main');
    }
}
