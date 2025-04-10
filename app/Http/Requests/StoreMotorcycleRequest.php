<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreMotorcycleRequest extends FormRequest
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
            'brand' => 'required',
            'type' => 'required',
            'licencePlate' => 'required',
            'year' => 'required',
            'gearbox' => 'required',
            'fuel' => 'required',
            'powerLe' => 'required',
            'powerkW' => 'required',
            'engineSize' => 'required',
            'drivingLicence' => 'required',
            'places' => 'required',
            'price' => 'required',
            'deposit' => 'required',
            'trafficDate' => 'required',
            'location' => 'required',
            'image' => 'required|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'isInService' => 'required',
            'problamComment' => 'nullable'
        ];
    }
}
