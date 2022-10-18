<?php

namespace App\Http\Requests;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Http\FormRequest;

class LikeRequest extends FormRequest
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
            'type' =>
            [
                "bail", "required", "string",
                // function ($attribute, $value, $fail) {
                //     if (!class_exists($value, true)) {
                //         $fail($value . " is not an existing class");
                //     }

                    // if (!in_array(Model::class, class_parents($value))) {
                    //     $fail($value . " is not Illuminate\Database\Eloquent\Model");
                    // }
                // }
            ],
            'id' => [
                'required',
                function ($attribute, $value, $fail) {
                    $class = $this->input('type');
                    if (!$class::where('id', $value)->exists()) {
                        $fail($value . " does not exists in database");
                    }
                }
            ],
        ];
    }

    public function likeable()
    {
        $class = $this->input('type');
        return $class::findOrFail($this->input('id'));
    }
}
