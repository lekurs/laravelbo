<?php


namespace App\Http\Controllers\Admin\Estimations;


use App\Http\Controllers\Controller;
use App\Repository\EstimationRepository;
use Illuminate\View\View;

class EstimationGetAllController extends Controller
{
    public function getAll(EstimationRepository $repository): View
    {
        $estimations = $repository->getAll();

        return view('bo.admin.estimations.show-estimations', [
            'estimations' => $estimations
        ]);
    }
}
