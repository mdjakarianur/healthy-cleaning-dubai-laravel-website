<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;

class CustomerRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'customer_name' => 'required',
            'phone' => 'required',
            'email' =>'required',
            'address' => 'required',
            'password' => 'required',
        ];
    }

    public function messages(){
        return [
            'customer_name.required' => 'Please give your Name',
            'phone.required' => 'Please give Phone Number',
            'email.required' => 'Please give your Email',
            'address.required' => 'Please give your Address',
            'password.required' => 'Please give your password',
        ];
    }
}
