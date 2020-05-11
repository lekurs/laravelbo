<?php


namespace App\Http\Controllers\Admin\Clients;

use App\Client;
use App\Helper\Slugify;
use \App\Http\Controllers\Controller;
use App\Http\Requests\ClientEdit;
use App\Repository\ClientRepository;
use \Illuminate\Http\Request;

class ClientsController extends Controller
{
    public function showAll(Request $request)
    {
        $clients = Client::all();

        return view('bo.admin.clients.clients', [
            'clients' => $clients,
        ]);
    }

    public function deleteOne(Request $request, $slug)
    {
        Client::where('slug', $slug)->delete();

    }


    public function editBySlug(Request $request, ClientRepository $clientRepository, ClientEdit $clientEdit)
    {
        $validates = $clientEdit->all();

        $clientRepository->editBySlug($validates, $request->get('slug'));
//        $validates = Validator::make($request->all(), [
//            'name' => 'required|max:255',
//            'siren' => 'nullable|max:255',
//            'address' => 'nullable|max:255',
//            'zip' => 'nullable|max:5',
//            'city' => 'nullable|max:255',
//            'phone' => 'nullable|max:10',
//            'slug' => Str::slug('name', '-')
//        ]);

//        if ($validates->fails()) {
//            return redirect()->route('showClients')
//                ->withErrors($validates)
//                ->withInput();
//        }

//        $slugify['slug'] = Str::slug($request->get('name'));
//
//        $validates = array_merge($validates->validate(), $slugify);
//
//        Client::where('slug', $slug)->update($validates);

        return back()->with('success', 'Client mis à jour');
    }
}

