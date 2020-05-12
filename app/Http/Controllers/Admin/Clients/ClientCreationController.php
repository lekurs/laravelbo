<?php


namespace App\Http\Controllers\Admin\Clients;


use App\Http\Controllers\Controller;
use App\Http\Requests\Clients\ClientCreation;
use App\Http\Requests\Contacts\ContactCreation;
use App\Repository\ClientRepository;
use Illuminate\Http\Request;

class ClientCreationController extends Controller
{
    public function clientCreation(Request$request)
    {
        return \view('bo.admin.clients.add-client');
    }

    public function addClient(Request $request, ClientRepository $repository, ClientCreation $clientCreation, ContactCreation $contactCreation)
    {
        $validator = $clientCreation->all();
        $validatesContact = $contactCreation->all();

        $repository->createWithContact($validator, $validatesContact);

        return redirect()->route('showClients')->with('success', 'Client ajouté');
    }
}
