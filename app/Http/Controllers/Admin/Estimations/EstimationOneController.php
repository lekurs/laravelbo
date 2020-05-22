<?php


namespace App\Http\Controllers\Admin\Estimations;


use App\Http\Controllers\Controller;
use App\Repository\EstimationRepository;
use Illuminate\View\View;

class EstimationOneController extends Controller
{
    public function show($id, EstimationRepository $repository): View
    {
        $estimation = $repository->getOne($id);

        return view('bo.admin.estimations.show-one-estimation', [
            'estimation' => $estimation
        ]);
    }
}
