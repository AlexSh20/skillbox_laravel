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
        $news = News::orderByDesc('created_at')->published()->simplePaginate(10);
        return view('news.index', compact('news'));
    }

    public function show(News $news)
    {
        return view('news.show', compact('news'));
    }

    public function comment(NewCommentRequest $request, News $news)
    {
        $attribute = $request->validated();
        $attribute ['user_id'] = auth()->id();
        $comment = Comment::create($attribute);
        $news->comments()->save($comment);

        return redirect()->back();
    }

}
