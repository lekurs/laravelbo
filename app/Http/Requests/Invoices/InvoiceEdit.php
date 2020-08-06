<?php


namespace App\Http\Requests\Invoices;


use Illuminate\Foundation\Http\FormRequest;

class InvoiceEdit extends FormRequest
{
    public function rules()
    {
        return [
          'invoice-title' => 'required|max:255',
          'invoice-price' => 'required'
        ];
    }
}
