<?php


namespace App\Http\Controllers\Admin\Estimations;


use App\Client;
use App\Http\Controllers\Controller;
use App\Repository\ContactRepository;

class EstimationController extends Controller
{
    public function show($idClient, ContactRepository $repository)
    {
        $contacts = $repository->getAllByIdClient($idClient);

        return view('bo.admin.estimations.estimation-create', [
            'contacts' => $contacts,

        ]);

    }
}
