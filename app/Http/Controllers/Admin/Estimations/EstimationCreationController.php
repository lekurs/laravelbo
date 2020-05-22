<?php


namespace App\Http\Controllers\Admin\Estimations;


use App\Contact;
use App\Http\Controllers\Controller;
use App\Http\Requests\Estimations\EstimationCreation;
use App\Repository\EstimationRepository;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class EstimationCreationController extends Controller
{
    public function createEstimation(Request $request, EstimationCreation $estimationCreation, EstimationRepository $repository): RedirectResponse
    {
        $validator = $estimationCreation->all();

        $contact = Contact::find($validator['contacts']);

        $repository->save($validator, $contact);

        return back()->with('success', 'Devis ajouté');
    }
}
