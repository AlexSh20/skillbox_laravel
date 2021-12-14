<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function articles()
    {
        return $this->belongsToMany(Article::class, 'tag_article');
    }

    public function getRouteKeyName()
    {
        return 'name';
    }

    public static function tagsCloud()
    {
        return (new static)->has('articles')->get();
    }

    public static function makeCollection($tags)
    {
        return collect(explode(',', $tags))->keyBy(function ($item){return $item;});
    }
}
