<?php

namespace App\Http\Requests\File;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Request;

class FileRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $method = Request::method();

        if ($method == 'PATCH' or $method == 'PUT') {
            return [
                'title' => 'max:255|string' ,
                'entitle' => 'nullable|max:255|string' ,
                'alt' => 'max:255|string' ,
            ];
        } else {
            return [
                'title' => 'max:255|string' ,
                'entitle' => 'nullable|max:255|string' ,
                'screenshot' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048' ,
                'src' => 'required|mimes:pdf,doc,docx|max:200000' ,
            ];


        }
    }

    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }
}
