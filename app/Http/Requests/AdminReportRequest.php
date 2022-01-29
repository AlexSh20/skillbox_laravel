<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AdminReportRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'articles_checkbox' => 'required_without_all:news_checkbox,comments_checkbox,tags_checkbox,users_checkbox',
            'news_checkbox' => 'required_without_all:articles_checkbox,comments_checkbox,tags_checkbox,users_checkbox',
            'comments_checkbox' => 'required_without_all:articles_checkbox,news_checkbox,tags_checkbox,users_checkbox',
            'tags_checkbox' => 'required_without_all:articles_checkbox,news_checkbox,comments_checkbox,users_checkbox',
            'users_checkbox' => 'required_without_all:articles_checkbox,news_checkbox,comments_checkbox,tags_checkbox',
        ];
    }
}
