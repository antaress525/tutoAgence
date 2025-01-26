<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class PropertyRequest extends FormRequest
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
            'title' => ['required', 'min:4'],
            'surface' => ['required', 'integer'],
            'price' => ['required', 'integer'],
            'room' => ['required', 'integer'],
            'floor' => ['required', 'integer'],
            'piece' => ['required', 'integer'],
            'description' => ['required'],
            'city' => ['required'],
            'adress' => ['required'],
            'postal_code' => ['required'],
            'sold' => ['required'],
            'options' => ['required', 'array']
        ];
    }
}
