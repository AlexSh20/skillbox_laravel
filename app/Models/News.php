<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    use HasFactory;
    public $guarded = [];

    public function scopePublished($query)
    {
        return $query->where('published', 1);
    }

}
