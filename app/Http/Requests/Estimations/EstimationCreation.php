<?php


namespace App\Http\Requests\Estimations;


use Illuminate\Foundation\Http\FormRequest;

class EstimationCreation extends FormRequest
{
    public function authorise(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
          'estimation-title' => 'required|max:255',
        ];
    }
}
