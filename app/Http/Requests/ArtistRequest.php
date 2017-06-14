<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ArtistRequest extends FormRequest
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
            'name'=>'required|unique:artists,name',
            'image'=>'required|image',
            //
        ];

    }
    public function messages()
    {
        return [
            'name.required'=>'Please enter name',
            'name.unique'=>"Artist's name is existed",
            'image.required'=>'Please chose Image',
            'image.image'=>'Type file not correct',

        ];
    }
}
