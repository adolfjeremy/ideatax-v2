<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CareerRequest extends FormRequest
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
            'jobdesc'=> "required", 
            'qualification' => "required", 
            'skill' => "nullable", 
            'course'=> "nullable",
            'jobdesc_eng'=> "nullable", 
            'qualification_eng'=> "nullable", 
            'skill_eng'=> "nullable", 
            'course_eng'=> "nullable", 
            'SEO_title'=> "nullable", 
            'SEO_title_eng'=> "nullable", 
            'description'=> "nullable", 
            'description_eng'=> "nullable"
        ];
    }
}
