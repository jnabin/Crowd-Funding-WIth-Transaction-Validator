<?php

namespace App\Http\Requests;
use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class EditRequest extends FormRequest
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
            'target_fund' => 'required|numeric',
            'campaigntype' => 'required|min:5',
            'description' => 'required|min:10',
            'enddate' => 'required',
            'title' => 'required|min:5'
           
        ];
    }

    // public function messages(){
    //     return [
    //         'name.required'=> "can't left empty....",
    //         'name.min'=> "must be at least 3 ch...."
    //     ];
    // }
}
