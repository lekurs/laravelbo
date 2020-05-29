<?php


namespace App\Http\Controllers\Admin\Clients;

use App\Http\Entity\Client;
use \App\Http\Controllers\Controller;
use App\Http\Requests\Clients\ClientEdit;
use App\Repository\ClientRepository;
use \Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use Illuminate\View\View;

class ClientsController extends Controller
{
    public function showAll(Request $request)
    {
        $clients = Client::paginate(15);

        if ($request->isMethod('post')) {
            $validator = Validator::make($request->all(), [
                'name' => 'required|max:255',
                'siren' => 'nullable|max:255',
                'address' => 'nullable|max:255',
                'zip' => 'nullable|max:5',
                'city' => 'nullable|max:255',
                'phone' => 'nullable|max:10',
                'slug' => Str::slug('name', '-')
            ]);

            if ($validator->fails()) {
                return redirect()->route('showClients')
                    ->withErrors($validator)
                    ->withInput();
            }

            $slug['slug'] = Str::slug($request->get('name'));

            $validator = array_merge($validator->validate(), $slug);

            Client::create($validator);

            return back()->with('success', 'Client ajouté');
        }
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

    public function deleteOne(Request $request, $slug)
    {
        $client = Client::where('slug', $slug)->delete();

//        $client->delete();
    }
}

