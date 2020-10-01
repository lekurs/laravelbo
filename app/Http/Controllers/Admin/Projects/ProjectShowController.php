<?php


namespace App\Http\Controllers\Admin\Projects;


use App\Http\Controllers\Controller;
use App\Repository\ProjectRepository;

class ProjectShowController extends Controller
{
    /**
     * @var ProjectRepository $projectRepository
     */
    private $projectRepository;

    /**
     * ProjectController constructor.
     * @param ProjectRepository $projectRepository
     */
    public function __construct(ProjectRepository $projectRepository)
    {
        $this->projectRepository = $projectRepository;
    }


    public function __invoke()
    {
        $projects = $this->projectRepository->getAll();

        return view('bo.admin.projects.projects-show', [
            'projects' => $projects
        ]);
    }
}
