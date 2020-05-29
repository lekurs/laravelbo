<?php


namespace App\Http\Controllers\Admin\Clients;

use App\Client;
use App\Helper\Slugify;
use \App\Http\Controllers\Controller;
use \Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use Illuminate\View\View;

class ClientsController extends Controller
{
    public function showAll(Request $request)
    {
        $clients = Client::all();

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

        return view('bo.admin.clients', [
            'clients' => $clients,
        ]);
    }

    public function deleteOne(Request $request, $slug)
    {
        $client = Client::where('slug', $slug)->delete();

//        $client->delete();
    }
}

