<?php


namespace App\Http\Controllers\Admin\Estimations;


use App\Http\Entity\Contact;
use App\Http\Controllers\Controller;
use App\Http\Requests\Estimations\EstimationCreation;
use App\Repository\EstimationRepository;
use Illuminate\Http\RedirectResponse;

class EstimationCreationController extends Controller
{
    public function storeEstimation(
        EstimationCreation $estimationCreation,
        EstimationRepository $repository
    ): RedirectResponse {

        $validator = $estimationCreation->all();

        $contact = Contact::find($validator['contacts']);

        $repository->save($validator, $contact);

        return redirect('showClients')->with('success', 'Devis ajouté');
    }
}
