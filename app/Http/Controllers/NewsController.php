<?php

namespace App\Http\Controllers;

use App\Http\Requests\NewCommentRequest;
use App\Models\Comment;
use App\Models\News;

class NewsController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $news = \Cache::tags(['news'])->remember('news',3600*24*7,function (){
            return News::orderByDesc('created_at')->published()->simplePaginate(10);
        });

        return view('news.index', compact('news'));
    }

    public function show(News $news)
    {
        return view('news.show', compact('news'));
    }

    public function comment(NewCommentRequest $request, News $news)
    {
        $validatedData = $request->validated();
        $validatedData ['user_id'] = auth()->id();
        $comment = Comment::create($validatedData);
        $news->comments()->save($comment);

        return redirect()->back();
    }

}
