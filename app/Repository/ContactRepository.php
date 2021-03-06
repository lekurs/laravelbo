<?php


namespace App\Repository;


use App\Http\Entity\Contact;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Str;

class ContactRepository
{
    public function getOneBySlug(string $slug): Contact
    {
        return Contact::whereSlug($slug)->first();
    }

    public function editBySlug(array $contactData, string $slug): void
    {
        $contact = Contact::whereSlug($slug)->first();
        $contact->name = $contactData['contact-name'];
        $contact->lastname = $contactData['contact-lastname'];
        $contact->phone = $contactData['contact-phone'];
        $contact->email = $contactData['contact-email'];
        $contact->slug = Str::slug($contactData['contact-name']);

        $contact->save();
    }

    public function getAllByIdClient(int $id): Collection
    {
        return Contact::has('client')->get();

    }

    public function deleteOne(string $slug):void
    {
        Contact::whereSlug($slug)->delete();
    }
}
