<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class storeAddressRequest extends FormRequest
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
     * @return
     */
    public function rules(): array
    {
        return [
            'title' => ['required', 'string'],
            'address' => ['required', 'string'],
            'latitude' => ['required', 'numeric', 'between:-90.000000,90.000000'],
            'longitude' => ['required', 'numeric', 'between:-180.000000,180.000000']
        ];
    }
}
