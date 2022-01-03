<?php

namespace App\Http\Controllers;

use App\Events\ArticleCreated;
use App\Events\ArticleDeleted;
use App\Events\ArticleUpdated;
use App\Http\Requests\NewArticleRequest;
use App\Http\Requests\UpdateArticleRequest;
use App\Models\Article;
use App\Models\Tag;
use App\Services\TagsSynchronizer;
use function Webmozart\Assert\Tests\StaticAnalysis\inArray;
use function Webmozart\Assert\Tests\StaticAnalysis\resource;
use Carbon\Carbon;

class ArticlesController extends Controller
{
    protected $tagsSynchronizer;

    public function __construct(TagsSynchronizer $tagsSynchronizer)
    {
        $this->tagsSynchronizer = $tagsSynchronizer;
        $this->middleware('auth')->except(['index', 'show']);
        $this->middleware('can:update,article')->except(['index', 'show', 'store', 'create']);
    }

    public function index()
    {
        //$num = Article::whereDate('created_at', '>', Carbon::now()->subDays(30))->count();
       // dd($num);

        $articles = Article::with('tags')->published()->get();
        return view('articles.index', compact('articles'));
    }

    public function create()
    {
        return view('articles.create');
    }

    public function store(NewArticleRequest $request)
    {
        $attribute = $request->validated();
        $attribute ['owner_id'] = auth()->id();
        $article = Article::create($attribute);
        $this->tagsSynchronizer->sync(Tag::makeCollection(request('tags')), $article);

        event(new ArticleCreated($article));

        return redirect()->route('main');
    }

    public function show(Article $article)
    {
        return view('articles.show', compact('article'));
    }

    public function edit(Article $article)
    {
        return view('articles.edit', compact('article'));
    }

    public function update(Article $article, UpdateArticleRequest $request)
    {
        $article->update($request->validated());
        $this->tagsSynchronizer->sync(Tag::makeCollection(request('tags')), $article);

        event(new ArticleUpdated($article));
        return redirect()->route('main');
    }

    public function destroy(Article $article)
    {
        event(new ArticleDeleted($article));
        $article->delete();
        return redirect()->route('main');
    }
}
