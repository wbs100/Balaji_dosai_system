<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateStockRequest extends FormRequest
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
    public function rules()
    {
        return [
            'transaction_type_id' => ['required', 'numeric'],
            'quantity' => ['required', 'numeric', 'min:1', 'max:10000'],
            'remarks' => ['nullable', 'string', 'max:120'],
        ];
    }
    function messages()
    {
        return [
            'transaction_type_id.required' => ' The transaction type is required',
            'quantity.required' => ' The quantity is required',
            'quantity.max' => ' The quantity must be less than 10,000',
        ];
    }
}
