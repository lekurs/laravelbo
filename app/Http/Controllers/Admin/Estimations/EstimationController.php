<?php


namespace App\Http\Controllers\Admin\Estimations;


use App\Client;
use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;

class EstimationController extends Controller
{
    public function show()
    {
        $estimations = Client::all();

        $json = json_encode($estimations);

        return view('bo.admin.estimations.show-estimations', [
            'json' => $json
        ]);
    }
}
