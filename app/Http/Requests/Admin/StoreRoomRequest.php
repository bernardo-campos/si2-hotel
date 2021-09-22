<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class StoreRoomRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
        return auth()->check() && $this->user()->hasRole('Admin');
    }

    /**
     * Prepare the data for validation.
     *
     * @return void
     */
    protected function prepareForValidation()
    {
        $this->merge([
            'has_tv' => $this->boolean('has_tv'),
            'has_minibar' => $this->boolean('has_minibar'),
            'has_ac' => $this->boolean('has_ac'),
        ]);
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'number' => 'string|max:5',
            'has_tv' => 'boolean',
            'has_minibar' => 'boolean',
            'has_ac' => 'boolean',
            'single_beds' => 'required|integer|numeric|between:0,10',
            'double_beds' => 'required|integer|numeric|between:0,6',
            'stauts' => 'nullable|string',
            'price' => 'numeric',
        ];
    }
}
