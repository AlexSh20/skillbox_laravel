<?php

namespace App\Http\Controllers;

use App\Models\Article;

class ArticlesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $title = "Главная страница";
        $articles = Article::published()->get();
        return view('articles.index', compact('title', 'articles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $title = "Добавление статьи";
        return view('articles.create', compact('title'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store()
    {

        $this->validate(request(), [
            'title' => 'required',
            'title' => 'required|min:5|max:100',
            'description' => 'required|max:255',
            'text' => 'required',
        ]);

        Article::create([
            'slug' => request('slug'),
            'name' => request('title'),
            'description' => request('description'),
            'text' => request('text'),
            'release' => request('release') == 'on' ? true : false,
        ]);

        return redirect()->route('main');

    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show(Article $slug)
    {
        $title = "Статья";
        return view('articles.show', compact('title', 'slug'));
    }


}
