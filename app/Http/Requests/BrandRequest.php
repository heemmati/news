<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BrandRequest extends FormRequest
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
            //
            'title' => 'required|max:191' ,
            'entitle' => 'regex:/(^([a-zA-Z]+)(\d+)?$)/u' ,
            'lang' => 'required',
            'place' => 'numeric|required',
            'category_id' => 'numeric|required',
        ];
    }
}
