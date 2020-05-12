<?php

namespace App\Http\Requests\Clients;

use Illuminate\Foundation\Http\FormRequest;

class ClientCreation extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'client-name' => 'required|max:255',
            'client-siren' => 'nullable|max:255',
            'client-address' => 'nullable|max:255',
            'client-zip' => 'nullable|max:5',
            'client-city' => 'nullable|max:255',
            'client-phone' => 'nullable|max:10',
        ];
    }
}
