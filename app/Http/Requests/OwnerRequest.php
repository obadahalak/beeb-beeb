<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class OwnerRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'fname'     => ['required' , 'string'],
            'lname'     => ['required' , 'string'],
            'email'     => ['required' , 'email'],
            'password' => 'required',
            'phone'     => ['required' , 'numeric'],
        ];
    }
}
