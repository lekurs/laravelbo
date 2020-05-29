<?php


namespace App\Http\Controllers\Admin\Estimations;


use App\Http\Controllers\Controller;
use App\Repository\EstimationRepository;
use Illuminate\Support\Facades\Storage;
use Illuminate\View\View;

class EstimationGetAllController extends Controller
{
    public function getAll(EstimationRepository $repository): View
    {
        $estimations = $repository->getAll();

        $test = Storage::get('images/uploads/alphabet-capitales.jpg');

        return view('bo.admin.estimations.show-estimations', [
            'estimations' => $estimations,
            'test' =>$test
        ]);
    }
}
