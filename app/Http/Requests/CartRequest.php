<?php

namespace App\Http\Requests;

use App\Models\Products;
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
            'products_id' => 'bail|required|exists:products,id',
            'quantity' => 'bail|required|integer|min:1',
            'addons' => 'array',
            'addons.*' => 'required|exists:attributes,id',
            'addons.another' => 'string'
        ];
    }


    public function validated($key = null, $default = null)
    {
        return array_merge(
            parent::validated() +
                [
                    'cart_user_id' => auth('sanctum')->user()->cartUser->id,
                ]
        );
    }
}
