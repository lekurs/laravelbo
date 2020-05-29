<?php


namespace App\Http\Requests\Invoices;


use Illuminate\Foundation\Http\FormRequest;

class InvoiceCreation extends FormRequest
{
    public function authorise(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
          'invoice-number' => 'required|max:50',
          'invoice-title' => 'required|max:255',
          'invoice-price' => 'required'
        ];
    }
}
