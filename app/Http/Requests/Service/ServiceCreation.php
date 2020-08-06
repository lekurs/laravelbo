<?php


namespace App\Http\Requests\Service;


use Illuminate\Foundation\Http\FormRequest;

class ServiceCreation extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
          'service-wording' => 'required|max:255',
          'service-description' => 'required',
          'service-icon' => 'required'
        ];
    }
}
