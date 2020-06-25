<?php


namespace App\Http\Requests\Projects;


use Illuminate\Foundation\Http\FormRequest;

class ProjectCreation extends FormRequest
{
    public function authorise(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
          'project-title' => 'required|max: 255',
          'project-mission' => 'required',
          'project-result' => '',
          'project-image-portfolio' => 'required',
          'project-color-project' => 'required|max: 7',
        ];
    }
}
