<?php


namespace App\Http\Controllers\Admin\Clients;

use App\Helper\ImageHelper\ImageHelper;
use App\Http\Controllers\Controller;
use App\Http\Requests\Clients\ClientCreation;
use App\Http\Requests\Contacts\ContactCreation;
use App\Repository\ClientRepository;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class ClientCreationController extends Controller
{
    public function clientCreation(): View
    {
        return view('bo.admin.clients.add-client');
    }

    public function addClient(
        ClientRepository $repository,
        ClientCreation $clientCreation,
        ContactCreation $contactCreation
    ): RedirectResponse {
        $validator = $clientCreation->all();
        $validatesContact = $contactCreation->all();

        ImageHelper::uploadWithPathNamed(request()->file()['client-logo'], strtolower($validator['client-name']));

        $imagePath = strtolower($validator['client-name']) . '/' . request()->file()['client-logo']->getClientOriginalName();

        $repository->createWithContact($validator, $validatesContact, $imagePath);

        return redirect()->route('showClients')->with('success', 'Client ajouté');
    }
}
