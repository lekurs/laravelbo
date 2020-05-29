<?php


namespace App\Http\Controllers\Admin\Contacts;


use App\Http\Controllers\Controller;
use App\Http\Requests\Contacts\ContactEdit;
use App\Repository\ContactRepository;

class ContactEditController extends Controller
{
    public function editBySlug(ContactEdit $contactEdit, ContactRepository $repository, $slug)
    {
        $validates = $contactEdit->all();

        $repository->editBySlug($validates, $slug);

        return back()->with('success', 'Contact mis à jour');
    }
}
