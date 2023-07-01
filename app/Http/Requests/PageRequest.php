<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PageRequest extends FormRequest
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
            'SEO_title'=> 'required|string',
            'SEO_title_eng'=> 'required|string',
            'description'=> 'required|string',
            'description_eng'=> 'required|string'
        ];
    }
}
