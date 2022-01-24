<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Feedback;
use App\Models\Article;

class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
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



}
