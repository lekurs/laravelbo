<?php


namespace App\Http\Controllers\Admin\Services;


use App\Http\Controllers\Controller;
use App\Repository\ServiceRepository;

class ServiceController extends Controller
{
    /**
     * @var ServiceRepository $serviceRepository
     */
    private $serviceRepository;

    /**
     * ServiceController constructor.
     * @param ServiceRepository $serviceRepository
     */
    public function __construct(ServiceRepository $serviceRepository)
    {
        $this->serviceRepository = $serviceRepository;
    }

    public function show()
    {
        $services = $this->serviceRepository->getAll();

        return view('bo.admin.services.service_show', [
            'services' => $services,
        ]);
    }
}
