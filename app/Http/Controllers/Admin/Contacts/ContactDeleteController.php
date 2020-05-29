<?php


namespace App\Http\Controllers\Admin\Contacts;


use App\Http\Controllers\Controller;
use App\Repository\ContactRepository;

class ContactDeleteController extends Controller
{
    public function deleteOne($slug, ContactRepository $contactRepository)
    {
        $contactRepository->deleteOne($slug);

        return back()->with('success', 'Contact supprimé');
    }
}
