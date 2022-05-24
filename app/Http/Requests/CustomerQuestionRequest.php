<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CustomerQuestionRequest extends FormRequest
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
            'name'=> "required|max:255",
            'title'=> "string|max:255",
            'email' => 'required|string|email',
            'question'=> "required|string",
            'answer'=> "string",
            'photo' => 'image',
            'status' => 'string',
            'tax_update_categories_id'=> "nullable|exists:tax_update_categories,id",
        ];
    }
}
