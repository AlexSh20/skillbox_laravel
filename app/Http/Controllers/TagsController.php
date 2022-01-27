<?php

namespace App\Http\Controllers;

use App\Models\Tag;
use Illuminate\Http\Request;

class TagsController extends Controller
{
    public function index(Tag $tag){
        $articles = $tag->articles()->with('tags')->get();
        $news = $tag->news()->with('tags')->get();
        return view('tags.index', compact( 'articles', 'news'));
    }
}
