<?php


namespace App\Http\Controllers\Admin\Contacts;


use App\Http\Controllers\Controller;
use App\Repository\ContactRepository;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function showOne(Request $request, ContactRepository $repository)
    {
        $contact = $repository->getOneBySlug($request->get('slug'));

        return view('bo.forms._edit_contact', [
            'contact' => $contact
        ]);
    }
}
