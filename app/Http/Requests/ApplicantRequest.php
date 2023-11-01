<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ApplicantRequest extends FormRequest
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
            'name'=> "required",
            'email'=> ['required', 'string', 'email:dns', 'max:255'], 
            'coverLetter' => "required",
            'resume' => "required|mimes:pdf|max:2024",
            'career_id'=> "required|exists:careers,id",
        ];
    }
}
