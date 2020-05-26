<?php


namespace App\Repository;

use App\Http\Entity\Contact;
use App\Http\Entity\Estimation;
use Carbon\Carbon;

class EstimationRepository
{
    public function getOne($id): Estimation
    {
        return Estimation::find($id);
    }

    public function totalByMonth($clientId)
    {
        $from = new \DateTime('first day of this month');
        $to = new \DateTime('last day of this month');

        return Estimation::whereBetween('created_at', [$from, $to])->where('client_id', '=', $clientId)->sum('price');
    }

    public function totalByClient($idClient)
    {
        return Estimation::where('client_id', '=',  $idClient)
            ->sum('price');
    }

    public function updateValidation(int $id): void
    {
        $estimation = Estimation::find($id);

        $estimation->validation = !$estimation->validation;

        $estimation->save();
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
