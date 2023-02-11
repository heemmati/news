<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LegalRequest extends FormRequest
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
            'register_number' => ['required', 'min:6', 'max:6'],
            'equity_type' => 'boolean',
            'melli_code' => ['required', 'min:11', 'max:11'],
            'manager_name' => ['string', 'min:6'],
            'newspaper' => ['required', 'mimes:jpeg,png,jpg,gif,svg'],
            'statute' => ['required', 'mimes:jpeg,png,jpg,gif,svg'],
            'certificate' => ['required', 'mimes:jpeg,png,jpg,gif,svg'],
            'name' => ['required', 'string', 'min:5'],
            'account' => ['required', 'string', 'min:5'],
            'username' => ['required', 'string', 'min:5'],
            'mobile' => ['required', 'regex:/^09[0-9]{9}$/', 'min:10'],
            'phone' => ['required', 'numeric', 'min:8', 'max:11'],
            'avatar' => ['required', 'mimes:jpeg,png,jpg,gif,svg'],

            'state_id' => ['numeric', 'required'],
            'country_id' => ['numeric', 'required'],
            'city_id' => ['numeric', 'required'],
            'longitude' => ['required'],
            'latitude' => ['required'],
            'address' => ['string', 'required'],
            'postalcode' => ['numeric', 'size:10'],
        ];
    }
}
