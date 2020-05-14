<?php


namespace App\Http\Controllers\Admin\Clients;


use App\Http\Controllers\Controller;
use App\Repository\ClientRepository;
use Illuminate\View\View;

class ClientShowController extends Controller
{
    public function showOne($slug, ClientRepository $repository): View
    {
        $client = $repository->getOneBySlug($slug);

        return view('bo.admin.clients.client-show-one', [
            'client' => $client,
        ]);
    }
}
