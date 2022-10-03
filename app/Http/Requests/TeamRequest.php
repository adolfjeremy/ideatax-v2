<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TeamRequest extends FormRequest
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
            'position' => 'string|required',
            'photo' => 'image',
            'biography'=> "required|string",
            'area_of_expertise'=> "required|string",
            'profile_picture' => 'image',
            'phone'=> 'nullable | numeric',
            'email' => 'string',
            'linkedin' => 'nullable | string'
        ];
    }
}
