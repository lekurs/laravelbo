<?php


namespace App\Repository;


use App\Http\Entity\Client;
use App\Http\Entity\Contact;
use Illuminate\Support\Str;

class ClientRepository
{
    public function createWithContact(array $clientData, array $contactsData)
    {
        $client = new Client();
        $client->name = $clientData['client-name'];
        $client->phone = $clientData['client-phone'];
        $client->address = $clientData['client-address'];
        $client->zip = $clientData['client-zip'];
        $client->city = $clientData['client-city'];
        $client->siren = $clientData['client-siren'];
        $client->slug = Str::slug($clientData['client-name']);

        $client->save();

        $contact = new Contact();
        $contact->name = $contactsData['contact-name'];
        $contact->lastname = $contactsData['contact-lastname'];
        $contact->email = $contactsData['contact-email'];
        $contact->phone = $contactsData['contact-phone'];
        $contact->slug = Str::slug($contactsData['contact-name']);

        $client->contacts()->save($contact);
    }

    public function getOneBySlug(string $slug): Client
    {
        return Client::whereSlug($slug)->first();

    }

    public function getOneBySlugWithEstimations(string $slug): Client
    {
        return Client::whereSlug($slug)
            ->with('estimationsByOrder')
            ->first();

    }

    public function getOneBySlugEstimationActive(string $slug): Client
    {
        return Client::whereSlug($slug)
            ->with('estimationsIsActive')
            ->first();
    }

    public function editBySlug(array $clientData, string $slug)
    {
        $client = Client::where('slug', '=', $slug)->first();
        $client->name = $clientData['client-name'];
        $client->siren = $clientData['client-siren'];
        $client->address = $clientData['client-address'];
        $client->zip = $clientData['client-zip'];
        $client->city = $clientData['client-city'];
        $client->phone = $clientData['client-phone'];
        $client->slug = Str::slug($clientData['client-name']);

        $client->update($clientData);
    }

    public function deleteOne(string $slug): void
    {
        Client::whereSlug($slug)->delete();
    }
}
