<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StorePost extends FormRequest
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
            'title.ar'=>'required',
            'body.ar'=>'required',
            'title.es'=>'required',
            'body.es'=>'required',
            'title.en'=>'required',
            'body.en'=>'required',

        ];
    }
    public function messages()
    {
        return [
            'title.ar.required'=>trans('validation.Arabic title is required'),
            'body.ar.required'=>trans('validation.Arabic body is required'),
            'title.es.required'=>trans('validation.Spanish title is required'),
            'body.es.required'=>trans('validation.Spanish body is required'),
            'title.en.required'=>trans('validation.English title is required'),
            'body.en.required'=>trans('validation.English body is required'),
        ];
    }
}
