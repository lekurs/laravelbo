<?php


namespace App\Http\Controllers\Admin\Estimations;


use App\Http\Controllers\Controller;
use App\Repository\ClientRepository;
use App\Repository\EstimationRepository;
use App\Repository\ServiceRepository;
use Illuminate\View\View;

class EstimationCreateController extends Controller
{
    /**
     * @var ClientRepository
     */
    private $clientRepository;

    /**
     * @var EstimationRepository
     */
    private $estimationRepository;

    /**
     * @var ServiceRepository
     */
    private $serviceRepository;

    /**
     * EstimationCreateController constructor.
     * @param ClientRepository $clientRepository
     * @param EstimationRepository $estimationRepository
     * @param ServiceRepository $serviceRepository
     */
    public function __construct(ClientRepository $clientRepository, EstimationRepository $estimationRepository, ServiceRepository $serviceRepository)
    {
        $this->clientRepository = $clientRepository;
        $this->estimationRepository = $estimationRepository;
        $this->serviceRepository = $serviceRepository;
    }


    public function create(string $slug): View
    {
        $client = $this->clientRepository->getOneBySlugWithContacts($slug);
        $services = $this->serviceRepository->getAll();

        return view('bo.admin.estimations.estimation-creation', [
            'client' => $client,
            'services' => $services
        ]);
    }
}
