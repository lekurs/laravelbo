<?php


namespace App\Http\Controllers\Admin\Estimations;


use App\Http\Controllers\Controller;
use App\Repository\EstimationRepository;

class EstimationStoreController extends Controller
{
    private $estimationRepository;

    /**
     * EstimationStoreController constructor.
     * @param $estimationRepository
     */
    public function __construct(EstimationRepository $estimationRepository)
    {
        $this->estimationRepository = $estimationRepository;
    }

    public function store()
    {
        dd(request()->request);
    }
}
