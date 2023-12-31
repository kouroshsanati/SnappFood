<?php

namespace App\Http\Requests\CommentRequest;

use Illuminate\Foundation\Http\FormRequest;

class StoreCommentRequest extends FormRequest
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
            'cart_id' => ['required','exists:carts,id'],
            'score' => ['required','between:1,5'],
            'content' => ['required', 'string', 'min:2', 'max:255'],
        ];
    }
}
