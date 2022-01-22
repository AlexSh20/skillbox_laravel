<?php

namespace App\Http\Controllers;

use App\Models\Feedback;
use App\Models\Article;
use App\Models\News;

class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->except(['index', 'show']);
        $this->middleware('can:enter,user')->except(['index', 'store', 'create','article']);
    }

    public function index()
    {
        $feedbacks = Feedback::orderByDesc('created_at')->get();
        return view('admin.feedback', compact('feedbacks'));
    }

    public function store()
    {

        $this->validate(request(), [
            'email' => 'required|email:rfc,dns',
            'message' => 'required|max:255',
        ]);

        Feedback::create([
            'email' => request('email'),
            'message' => request('message'),
        ]);

        return redirect()->route('contacts');

    }

    public function article()
    {
        $articles = Article::with('tags')->simplePaginate(20);
        return view('articles.index', compact('articles'));
    }

    public function news()
    {
        $news = News::orderByDesc('created_at')->simplePaginate(20);
        return view('admin.news', compact('news'));
    }

}
