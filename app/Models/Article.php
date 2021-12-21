<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    public $guarded = [];

    public function getRouteKeyName()
    {
        return 'slug';
    }

    public function scopePublished($query)
    {
        return $query->where('release', 1);
    }

    public function tags()
    {
        return $this->belongsToMany(Tag::class, 'tag_article');
    }

    public function owner()
    {
        return $this->belongsTo(User::class);
    }


}
