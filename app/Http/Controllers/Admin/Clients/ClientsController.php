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

<<<<<<< HEAD
    public function deleteOne(Request $request, $slug)
    {
        $client = Client::where('slug', $slug)->delete();

//        $client->delete();
=======
    public function showOne(Request $request, $slug)
    {
        $client = Client::where('slug', $slug);
        $clients = Client::all();

        return view('bo.admin.clients', [
            'clients' => $clients,
        ]);
    }

    public function deleteOne($slug)
    {
        $client = Client::where('slug', $slug)->delete();
    }

    public function editBySlug(Request $request, $slug)
    {
        $validates = Validator::make($request->all(), [
            'name' => 'required|max:255',
            'siren' => 'nullable|max:255',
            'address' => 'nullable|max:255',
            'zip' => 'nullable|max:5',
            'city' => 'nullable|max:255',
            'phone' => 'nullable|max:10',
            'slug' => Str::slug('name', '-')
        ]);

        if ($validates->fails()) {
            return redirect()->route('showClients')
                ->withErrors($validates)
                ->withInput();
        }

        $slugify['slug'] = Str::slug($request->get('name'));

        $validates = array_merge($validates->validate(), $slugify);

        Client::where('slug', $slug)->update($validates);

        return back()->with('success', 'Client mis à jour');
>>>>>>> b0e8e4965858cb3eeb6238b50634e9880f8e144c
    }
}

