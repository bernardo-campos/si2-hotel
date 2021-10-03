<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

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
            'total_beds' => $this->single_beds + $this->double_beds,
        ]);
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        // dd($this->room);
        return [
            'number' => [
                'string',
                'max:5',
                Rule::unique('rooms')->ignore(optional($this->room)->id),
            ],
            'has_tv' => 'boolean',
            'has_minibar' => 'boolean',
            'has_ac' => 'boolean',
            'single_beds' => 'required|integer|numeric|between:0,10',
            'double_beds' => 'required|integer|numeric|between:0,6',
            'total_beds' => 'integer|numeric|gt:0',
            'stauts' => 'nullable|string',
            'price' => 'numeric',
        ];
    }

    public function messages()
    {
        return [
            'total_beds.gt' => 'El número total de camas debe ser mayor que 0',
        ];
    }
}
