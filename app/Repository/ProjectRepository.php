<?php


namespace App\Repository;


use App\Http\Entity\Project;
use Illuminate\Database\Eloquent\Collection;

class ProjectRepository
{
    public function getAll(): Collection
    {
        return Project::all();
    }

    public function getOneBySlug(string $slug): Project
    {
        return Project::whereSlug($slug);
    }

    public function save(array $datas): void
    {
        $project = new Project();


        dd();
        $project->save();
    }
}
