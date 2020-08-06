<?php


namespace App\Http\Controllers\Admin\Services;


use App\Http\Controllers\Controller;
use App\Repository\ServiceRepository;

class ServiceUpdateController extends Controller
{
    /**
     * @var ServiceRepository $serviceRepository
     */
    private $serviceRepository;

    /**
     * ServiceUpdateController constructor.
     * @param ServiceRepository $serviceRepository
     */
    public function __construct(ServiceRepository $serviceRepository)
    {
        $this->serviceRepository = $serviceRepository;
    }

    public function edit(int $id)
    {
        $service = $this->serviceRepository->getOne($id);

        dd($service);
    }

    public function update(int $id)
    {


        return redirect()->back()->with('success', 'Service modifié');
    }
}
