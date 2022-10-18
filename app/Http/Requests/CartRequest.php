<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CartRequest extends FormRequest
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
            'products_id'=>'bail|required|exists:products,id',
            'quantity'=>'bail|required|integer|min:1',
            'addons'=>'array',
            'addons.add_id'=>'required|exists:attributes,id',
            'addons.another'=>'string'
        ];
    }


}
