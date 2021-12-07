<?php

namespace App;
use App\Models\Article;

class FormRequest
{
    public function validate()
    {
        dd(request()->all());
    }

    public function newArticleValidate()
    {
         return request()->validate([
            'slug' => 'required|unique:articles,slug|regex:/^[a-z0-9-]+$/i',
            'name' => 'required|min:5|max:100',
            'description' => 'required|max:255',
            'text' => 'required',
        ]);
    }
    public function updateArticleValidate()
    {
        return request()->validate([
            //'slug' => 'required|unique:articles,slug|regex:/^[a-z0-9-]+$/i',
            'name' => 'required|min:5|max:100',
            'description' => 'required|max:255',
            'text' => 'required',
            'release' => '',
        ]);
    }

}
