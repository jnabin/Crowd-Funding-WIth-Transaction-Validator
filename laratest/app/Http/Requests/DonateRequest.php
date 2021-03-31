<?php

namespace App\Http\Requests;
use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class DonateRequest extends FormRequest
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
            'donation' => 'required|numeric'
        ];
    }

    // public function messages(){
    //     return [
    //         'name.required'=> "can't left empty....",
    //         'name.min'=> "must be at least 3 ch...."
    //     ];
    // }
}
