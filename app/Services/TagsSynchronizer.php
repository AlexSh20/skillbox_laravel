<?php


namespace App\Services;


use App\Models\Article;
use App\Models\Tag;
use Illuminate\Support\Collection;

class TagsSynchronizer
{
    public static function sync(Collection $tags, Article $article)
    {
        $articleTags = $article->tags->keyBy('name');

        $syncIds = $articleTags->intersectByKeys($tags)->pluck('id')->toArray();
        $tagsToAttach = $tags->diffKeys($articleTags);

        foreach ($tagsToAttach as $tag) {
            $tag = Tag::firstOrCreate(['name'=>$tag]);
            $syncIds[] = $tag->id;
        }

        return $article->tags()->sync($syncIds);
    }

}
