<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ArticleRequest extends FormRequest
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
            'title'=> "required|max:255",
            'photo' => 'image',
            'body'=> "required|string",
            'article_categories_id'=> "required|exists:article_categories,id",
            'author_id' => "nullable|exists:authors,id",
        ];
    }
}
