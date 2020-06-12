<?php


namespace App\Http\Controllers\Admin\Estimations;


use App\Http\Controllers\Controller;
use App\Repository\ClientRepository;
use App\Repository\EstimationRepository;
use Illuminate\Support\Facades\Storage;
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
     * EstimationCreateController constructor.
     * @param ClientRepository $clientRepository
     * @param EstimationRepository $estimationRepository
     */
    public function __construct(ClientRepository $clientRepository, EstimationRepository $estimationRepository)
    {
        $this->clientRepository = $clientRepository;
        $this->estimationRepository = $estimationRepository;
    }


    public function create(string $slug): View
    {
        $client = $this->clientRepository->getOneBySlugWithContacts($slug);

        return view('bo.admin.estimations.estimation-creation', [
            'client' => $client,
        ]);
    }
}
