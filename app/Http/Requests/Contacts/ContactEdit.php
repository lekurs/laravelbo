<?php


namespace App\Http\Requests\Contacts;


use Illuminate\Foundation\Http\FormRequest;

class ContactEdit extends FormRequest
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
     * @return array
     */
    public function rules()
    {
        return [
            'contact-name' => 'required|max:255',
            'contact-lastname' => 'required|max:255',
            'contact-phone' => 'max:10',
            'contact-email' => 'required|max:255',
        ];
    }
}
