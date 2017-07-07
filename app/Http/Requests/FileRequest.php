<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class FileRequest extends FormRequest
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
            'name'=>'required|unique:files,name',
            //'file'=>'required',
            //
        ];
    }
    public function messages()
    {
        return [
            'name.required'=>"Please enter file's name",
            'name.unique'=>"File's name existed",
            //'file.required'=>'Please insert file',
           // 'file.mimetypes'=>"Type's file is not support"
        ];
    }
}
