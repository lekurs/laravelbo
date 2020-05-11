<?php


namespace App\Http\Controllers\Admin\Contacts;


use App\Http\Controllers\Controller;

class ContactController extends Controller
{
    public function showOne(string $slug)
    {
        $conctact = 'contact';

        return view('bo.forms._edit_contact', [
            'contact' => $conctact
        ]);
    }
}
