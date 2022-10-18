<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RestRequest extends FormRequest
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
            'owners_id'     => ['required' , 'exists:owners,id'],
            'section_id'    => ['required' , 'exists:sections,id'],
            'name'          => ['required' , 'string'],
            'phone'         => ['required' , 'numeric'],
            'address'       => ['string'],
            'lat'           => ['required' , 'string'],
            'long'          => ['required' , 'string'],
            'description'   => ['required' , 'string'],
            'delivery_cost'   => ['required'],
            'delivery_date'   => ['required' ],
            // 'expire_date'   => ['required' ],
            // 'code'   => ['required' ],
            // 'discount'   => ['required' ],
           // 'offer'     => 'required',


           // 'time'          => [ 'array' , 'required' ],
          //  'delivary'      => ['required'],
          //  'is_open'       => ['required' , 'boolean'],
            'status'        => ['required' , 'boolean'],
        ];
    }
}
