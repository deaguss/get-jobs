<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProfileRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'first_name' => 'string|max:255',
            'last_name' => 'string|max:255',
            'address' => 'string|max:255',
            'city' => 'string|max:255',
            'country' => 'string|max:255',
            'postal_code' => 'string|min:5|max:5',
            'phone' => 'string|min:10|max:15',
            'avatar' => 'image|mimes:jpeg,png,jpg|max:2048',
            'hobbies' => 'string',
            'languages' => 'string',
            'is_visible' => 'string',
            'avaliable' => 'string',
            'resume' => 'mimes:doc,docx,pdf|max:2048',
            'cover_letter' => 'mimes:doc,docx,pdf|max:2048',
            'recent_work' => 'string',
            'recent_education' => 'string',
            'personal_summmary' => 'string',
            'skills' => 'string',
        ];
    }
}
