<?php


namespace App\Http\Controllers\Admin\Services;


use App\Http\Controllers\Controller;
use App\Http\Requests\Service\ServiceCreation;
use App\Repository\ServiceRepository;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class ServiceStoreController extends Controller
{
    /**
     * @var ServiceRepository $serviceRepository
     */
    private $serviceRepository;

    /**
     * StoreServiceController constructor.
     * @param ServiceRepository $serviceRepository
     */
    public function __construct(ServiceRepository $serviceRepository)
    {
        $this->serviceRepository = $serviceRepository;
    }

    public function store(ServiceCreation $validator): RedirectResponse
    {
        $service = $validator->all();

        $this->serviceRepository->save($service);

        return redirect()->route('admin')->with('success', 'Service créé');
    }
}
