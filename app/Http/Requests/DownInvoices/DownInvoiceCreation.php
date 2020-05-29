<?php


namespace App\Http\Requests\DownInvoices;


use Illuminate\Foundation\Http\FormRequest;

class DownInvoiceCreation extends FormRequest
{
    public function authorise(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
          'down-invoice-number' => 'required|max:50',
          'down-invoice-title' => 'required|max:255',
          'down-invoice-price' => 'required'
        ];
    }
}
