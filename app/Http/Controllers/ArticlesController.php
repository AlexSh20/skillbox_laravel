<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Articles;
use Illuminate\Support\Str;

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
        $articles = Articles::Release()->get();
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
            'title' => 'required|min:5|max:100',
            'description' => 'required|max:255',
            'text' => 'required',
        ]);

        Articles::create([
            'slug' => Str::slug(request('title'), '-'),
            'name' => request('title'),
            'description' => request('description'),
            'text' => request('text'),
            'release' => request('release') == 'on' ? true : false,
        ]);

        return redirect('/');

    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show(Articles $slug)
    {
        $title = "Статья";
        return view('articles.show', compact('title', 'slug'));
    }


}
