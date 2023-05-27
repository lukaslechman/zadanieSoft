<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CarStoreRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
                'car.name'=>'required|string|min:3',
                'car.is_registered' => 'required|boolean' ,
                'car.registration_number'=>'nullable|required_if:car.is_registered,==,true,|min:3'
        ];
    }

         /**
     * Custom message for validation
     *
     * @return array
     */
    public function messages()
    {
        return [
            'car.name.required' => 'Car name is required!',
            'car.is_registered.boolean' => 'is_registered must be boolean or 0,1!',
            'car.registration_number.required' => 'Car registration number is required when car is registered!',
            'car.registration_number.required_if.car.is_registered' => 'Car registration number is required when car is registered!'
        ];
    }


}
