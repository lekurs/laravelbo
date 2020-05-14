<?php


namespace App\Http\Requests\Navigation;


use Illuminate\Foundation\Http\FormRequest;

class NavigationCreation extends FormRequest
{
    public function authorise():bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'navigation-wording' => 'required|max:100',
            'position' => '',
            'parent' => '',
            'parentOrder' => '',
            'favorite' => '',
            'active' => '',
        ];
    }
}
