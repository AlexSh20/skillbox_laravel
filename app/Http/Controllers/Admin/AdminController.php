<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Feedback;
use App\Models\Article;
use Illuminate\Support\Facades\DB;

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

    public function statistics()
    {
        $articlesCount = DB::table('articles')->count();
        $newsCount = DB::table('news')->count();

        $mostProductiveAuthor = DB::table('articles')
            ->select(DB::raw('owner_id, COUNT(owner_id) as count'))
            ->groupBy('owner_id')
            ->join('users', 'articles.owner_id', '=', 'users.id')
            ->addSelect('users.name as name')
            ->orderByDesc('count')
            ->first();

        $longestArticle = DB::table('articles')
            ->select(DB::raw('*, LENGTH(text) as length'))
            ->groupBy('id')
            ->orderByDesc('length')
            ->first();

        $shortestArticle = DB::table('articles')
            ->select(DB::raw('*, LENGTH(text) as length'))
            ->groupBy('id')
            ->orderBy('length', 'asc')
            ->first();

        $averageNumberOfArticles = DB::table('articles')
            ->select(DB::raw('owner_id, COUNT(owner_id) as count'))
            ->havingRaw('count > ?', [1])
            ->groupBy('owner_id')
            ->get();

        $mostChangeableArticle = DB::table('article_histories')
            ->select(DB::raw('COUNT(article_id) as count'))
            ->groupBy('article_id')
            ->join('articles', 'article_histories.article_id', '=', 'articles.id')
            ->addSelect('name', 'slug')
            ->orderByDesc('count')
            ->first();

        $mostDiscussedArticle = DB::table('comments')
            ->select(DB::raw('commentable_id, COUNT(commentable_type) as count'))
            ->where('commentable_type', 'like', '%Article%')
            ->groupBy('commentable_id')
            ->join('articles', 'comments.commentable_id', '=', 'articles.id')
            ->addSelect('name', 'slug')
            ->orderByDesc('count')
            ->first();

        return view('admin.statistics', [
            'articlesCount' => $articlesCount,
            'newsCount' => $newsCount,
            'mostProductiveAuthor' => $mostProductiveAuthor,
            'longestArticle' => $longestArticle,
            'shortestArticle' => $shortestArticle,
            'averageNumberOfArticles' => $averageNumberOfArticles,
            'mostChangeableArticle' => $mostChangeableArticle,
            'mostDiscussedArticle' => $mostDiscussedArticle,
        ]);
    }
    
}
