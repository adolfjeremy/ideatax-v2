<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UserRequest extends FormRequest
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
            'name' => 'required|string|max:50',
            'email' => ['required', 'string', 'email:dns', 'max:255', Rule::unique('users')->ignore($this->user),],
            'roles' => 'nullable|string|in:ADMIN,SUPER_ADMIN',
        ];
    }
}
