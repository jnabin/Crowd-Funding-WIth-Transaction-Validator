<?php

namespace App\Http\Requests;
use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class RegistrationRequest extends FormRequest
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
            'first_name' => 'required',
            'last_name' => 'required',
            'email'=> [
                'required',
                Rule::unique('users', 'email')->ignore($this->users)
            ],
            'username'=> [
                'required',
                Rule::unique('users', 'username')->ignore($this->users)
            ],
            'myfile' => 'required',
            'password' => 'required|min:4',
            'password_confirmation' => 'required|same:password'
        ];
    }

    // public function messages(){
    //     return [
    //         'name.required'=> "can't left empty....",
    //         'name.min'=> "must be at least 3 ch...."
    //     ];
    // }
}
