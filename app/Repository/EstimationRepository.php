<?php


namespace App\Repository;

use App\Contact;
use App\Estimation;

class EstimationRepository
{
    public function getOne($id): Estimation
    {
        return Estimation::find($id);
    }

    public function save(array $estimationDatas, Contact $contact): void
    {
        $client = $contact->client;

        $estimation = new Estimation();
        $estimation->number = $estimationDatas['estimation-number'];
        $estimation->title = $estimationDatas['estimation-title'];
        $estimation->body = $estimationDatas['estimation-body'];
        $estimation->price = $estimationDatas['estimation-price'];
        $estimation->client_id = $client->id;
        $estimation->contact_id = $contact->id;

        $estimation->save();

    }
}
