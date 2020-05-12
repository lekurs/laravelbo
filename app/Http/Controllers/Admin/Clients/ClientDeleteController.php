<?php


namespace App\Http\Controllers\Admin\Clients;


use App\Http\Controllers\Controller;
use App\Repository\ClientRepository;

class ClientDeleteController extends Controller
{
    public function deleteOne(string $slug, ClientRepository $clientRepository)
    {
        $clientRepository->deleteOne($slug);

        return back()->with('success', 'Client supprimé');
    }
}
