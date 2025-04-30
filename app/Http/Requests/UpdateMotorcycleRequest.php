<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateMotorcycleRequest extends FormRequest
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
        return [/*
            'brand' => 'string|max:20',
            'type' => 'string|max:100',
            'licencePlate' => 'string|unique:motorcycles,licencePlate',
            'year' => 'integer|between:1900,2025',
            'gearbox' => 'string|max:25',
            'fuel' => 'string',
            'powerLe' => 'numeric|min:0',
            'powerkW' => 'numeric|min:0',
            'engineSize' => 'numeric|min:0',
            'drivingLicence' => 'string|max:4',
            'places' => 'integer|between:1,10',
            'price' => 'integer|min:0',
            'deposit' => 'integer|min:0',
            'trafficDate' => 'date',
            'location' => 'nullable|string|max:255',
            'image' => 'mimes:jpeg,png,jpg,gif,svg|max:2048',
            'isInService' => 'boolean',
            'problamComment' => 'nullable|string',*/
        ];
    }
}
