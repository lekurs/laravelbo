<?php


namespace App\Http\Controllers\Admin\Clients;

use App\Client;
use App\Helper\Slugify;
use \App\Http\Controllers\Controller;
use \Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\View\View;

class ClientsController extends Controller
{
    public function showAll(Request $request)
    {
        $clients = Client::all();

        if ($request->isMethod('post')) {
            $validator = $request->validate([
                'name' => 'required|max:255',
                'siren' => 'nullable|max:255',
                'address' => 'nullable|max:255',
                'zip' => 'nullable|max:5',
                'city' => 'nullable|max:255',
                'phone' => 'nullable|max:255',
                'slug' => Str::slug('name')
            ]);

            Client::create($validator);

            return redirect()->route('showClients');
        }

        return view('bo.admin.clients', [
            'clients' => $clients,
        ]);
    }
}

