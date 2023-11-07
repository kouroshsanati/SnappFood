<?php

namespace App\Http\Requests\RestaurantRequest;

use Illuminate\Foundation\Http\FormRequest;

class UpdateRestaurantRequest extends FormRequest
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
                'name' => 'required',
                'address' => 'required',
                'telephone' => 'required',
                'bank_account_number' => 'required',

            ];

    }
}
