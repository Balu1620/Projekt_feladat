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
        return [
            'brand' => 'required|string|max:20',
            'type' => 'required|string|max:100',
            'licencePlate' => 'required|string|unique:motorcycles,licencePlate',
            'year' => 'required|integer|between:1900,2025',
            'gearbox' => 'required|string|max:25',
            'fuel' => 'required|string|size:1|in:B,E',
            'powerLe' => 'required|numeric|min:0',
            'powerkW' => 'required|numeric|min:0',
            'engineSize' => 'required|numeric|min:0',
            'drivingLicence' => 'required|string|max:4',
            'places' => 'required|integer|between:1,10',
            'price' => 'required|integer|min:0',
            'deposit' => 'required|integer|min:0',
            'trafficDate' => 'required|date',
            'location' => 'nullable|string|max:255',
            'image' => 'required|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'isInService' => 'required|boolean',
            'problamComment' => 'nullable|string',
        ];
    }
}
