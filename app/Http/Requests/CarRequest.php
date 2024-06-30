<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CarRequest extends FormRequest
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
        switch ($this->method()) {
            case 'GET': {
                    return [
                        'limit' => 'nullable|numeric|min:1'
                    ];
                }

            case 'POST': {
                    return [
                        'car_model_id' => 'required|exists:App\Models\CarModel,id',
                        'year' => 'nullable|numeric|between:1970,' . date('Y'),
                        'kmage' => 'nullable|numeric|min:0',
                        'color' => 'nullable|string'
                    ];
                }

            case 'PUT': {
                    return [
                        'car_model_id' => 'required|exists:App\Models\CarModel,id',
                        'year' => 'nullable|numeric|between:1970,' . date('Y'),
                        'kmage' => 'nullable|numeric|min:0',
                        'color' => 'nullable|string'
                    ];
                }
            default:
                break;
        }
    }
}
