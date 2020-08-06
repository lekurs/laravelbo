<?php


namespace App\Http\Controllers\Admin\Projects;


use App\Http\Controllers\Controller;
use App\Repository\ClientRepository;
use App\Repository\ProjectRepository;
use App\Repository\ServiceRepository;
use Illuminate\View\View;

class ProjectCreationController extends Controller
{
    /**
     * @var ProjectRepository $projectRepository
     */
    private ProjectRepository $projectRepository;

    /**
     * @var ServiceRepository $serviceRepository
     */
    private ServiceRepository $serviceRepository;

    private ClientRepository $clientRepository;

    /**
     * ProjectCreationController constructor.
     * @param ProjectRepository $projectRepository
     * @param ServiceRepository $serviceRepository
     * @param ClientRepository $clientRepository
     */
    public function __construct(
        ProjectRepository $projectRepository,
        ServiceRepository $serviceRepository,
        ClientRepository $clientRepository
    ) {
        $this->projectRepository = $projectRepository;
        $this->serviceRepository = $serviceRepository;
        $this->clientRepository = $clientRepository;
    }


    public function create(): View
    {
        $services = $this->serviceRepository->getAll();
        $clients = $this->clientRepository->getAll();

        return view('bo.admin.projects.project-creation', [
            'services' => $services,
            'clients' => $clients
        ]);
    }

    public function store()
    {
        dd(request()->files);
    }
}
