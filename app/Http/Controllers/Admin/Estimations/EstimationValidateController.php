<?php


namespace App\Http\Controllers\Admin\Estimations;


use App\Http\Controllers\Controller;
use App\Repository\EstimationRepository;
use Illuminate\Http\Request;

class EstimationValidateController extends Controller
{
    public function updateValidation($id, EstimationRepository $repository)
    {
        $repository->updateValidation($id);

        $validation = $repository->getOne($id)->validation;

        return response()->json($validation);
    }
}
