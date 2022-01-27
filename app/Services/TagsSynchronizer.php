<?php

namespace App\Services;

use App\Models\Tag;
use Illuminate\Support\Collection;

class TagsSynchronizer
{

    public function sync(Collection $tags, $object)
    {
        $objectTags = $object->tags->keyBy('name');

        $syncIds = $objectTags->intersectByKeys($tags)->pluck('id')->toArray();
        $tagsToAttach = $tags->diffKeys($objectTags);

        foreach ($tagsToAttach as $tag) {
            $tag = Tag::firstOrCreate(['name'=>$tag]);
            $syncIds[] = $tag->id;
        }

        return $object->tags()->sync($syncIds);
    }
}
