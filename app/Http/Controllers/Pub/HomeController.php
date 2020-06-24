<?php


namespace App\Http\Controllers\Pub;


use App\Http\Controllers\Controller;
use App\Repository\ServiceRepository;

class HomeController extends Controller
{
    /**
     * @var ServiceRepository $servicesRepository
     */
    private $servicesRepository;

    /**
     * HomeController constructor.
     * @param ServiceRepository $servicesRepository
     */
    public function __construct(ServiceRepository $servicesRepository)
    {
        $this->servicesRepository = $servicesRepository;
    }


    public function home()
    {
        $services = $this->servicesRepository->getAll();

        return view('public.home', [
            'services' => $services
        ]);
    }
}
