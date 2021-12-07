<?php

namespace App\Services;
use App\Models\Article;

class FormRequest
{
    public function validate()
    {
        if(request()->input('_method') == 'PATCH')
        {
            return $this->updateArticleValidate();
        } else {
            return $this->newArticleValidate();
        }
    }

    public function newArticleValidate()
    {
         return request()->validate([
            'slug' => 'required|unique:articles,slug|regex:/^[a-z0-9-]+$/i',
            'name' => 'required|min:5|max:100',
            'description' => 'required|max:255',
            'text' => 'required',
            'release' => '',
        ]);
    }
    public function updateArticleValidate()
    {
        return request()->validate([
            'name' => 'required|min:5|max:100',
            'description' => 'required|max:255',
            'text' => 'required',
            'release' => '',
        ]);
    }

}
