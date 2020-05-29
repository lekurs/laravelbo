<?php


namespace App\Http\Controllers\Admin\Clients;

use App\Http\Controllers\Controller;
use App\Repository\ClientRepository;

class ClientUpdateController extends Controller
{
    public function getOneClient(ClientRepository $repository, $slug)
    {
        $client = $repository->getOneBySlug($slug);

        return view('bo.admin.clients.edit-one', [
            'client' => $client,
        ]);
    }
}
