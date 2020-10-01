<?php


namespace App\Http\Controllers\Pub;


use App\Http\Controllers\Controller;
use App\Repository\ProjectRepository;
use App\Repository\ServiceRepository;

class HomeController extends Controller
{
    /**
     * @var ServiceRepository $servicesRepository
     */
    private $servicesRepository;

    private ProjectRepository $projectRepository;

    /**
     * HomeController constructor.
     * @param ServiceRepository $servicesRepository
     * @param ProjectRepository $projectRepository
     */
    public function __construct(
        ServiceRepository $servicesRepository,
        ProjectRepository $projectRepository
    ) {
        $this->servicesRepository = $servicesRepository;
        $this->projectRepository = $projectRepository;
    }


    public function home()
    {
        $services = $this->servicesRepository->getAll();

        $projects = $this->projectRepository->getAllWithMediasOrderByNewer();

        return view('public.home', [
            'services' => $services,
            'projects' => $projects
        ]);
    }
}
