<?php


namespace App\Http\Controllers\Admin\Clients;

use App\Http\Entity\Client;
use \App\Http\Controllers\Controller;
use App\Http\Requests\Clients\ClientEdit;
use App\Repository\ClientRepository;
use \Illuminate\Http\Request;

class ClientsController extends Controller
{
    public function showAll(Request $request)
    {
        $clients = Client::paginate(15);

        return view('bo.admin.clients.clients', [
            'clients' => $clients,
        ]);
    }


    public function editBySlug(Request $request, ClientRepository $clientRepository, ClientEdit $clientEdit, $slug)
    {
        $validates = $clientEdit->all();

        $clientRepository->editBySlug($validates, $slug);

        return back()->with('success', 'Client mis à jour');
    }
}

