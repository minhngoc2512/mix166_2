<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;


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
            'name'=>'required|unique:users,name',
            'pass'=>'required|min:6|same:Repass',
            'Repass'=>'required|min:6',
            'email'=>'required|unique:users,email',
        ];
    }
    public function messages(){
        return [
            'name.required'=>'Please input user name',
            'name.unique'=>'User name existed',
            'pass.required'=>'Please input password',
            'pass.min'=>'Password too short',
            'Repass.required'=>'Please input password',
            'pass.same'=>'Try enter again with Repass',
            'email.required'=>'Please input email',

        ];

    }
}
