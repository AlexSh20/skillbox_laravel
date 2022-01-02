<?php

namespace App\Http\Controllers;

use App\Models\Feedback;
use App\Models\Article;

class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->except(['index', 'show']);
        $this->middleware('can:enter,user')->except(['index', 'store', 'create','article']);
    }

    public function index()
    {
        $title = "Посмотреть обращения";
        $feedbacks = Feedback::orderByDesc('created_at')->get();
        return view('admin.feedback', compact('title','feedbacks'));
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
        $articles = Article::with('tags')->get();
        return view('articles.index', compact('articles'));
    }

}
