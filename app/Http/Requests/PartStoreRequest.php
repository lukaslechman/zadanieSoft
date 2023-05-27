<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PartStoreRequest extends FormRequest
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
        'part.name' =>'required|string',
        'part.serial_number' => 'required|string',
        'part.car_id' => 'required'
        ];
    }


    public function messages()
    {
        return [
            'part.name.required' => 'Name is required!',
            'part.serial_number' => 'Serial number is required!',
            'part.car_id' => 'Id is required!',
        ];
    }
}
