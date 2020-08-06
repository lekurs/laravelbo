<?php


namespace App\Repository;

use App\Http\Entity\Contact;
use App\Http\Entity\Estimation;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\DB;

class EstimationRepository
{
    private $_month = [
        '01' => 'Janvier',
        '02' => 'Février',
        '03' => 'Mars',
        '04' => 'Avril',
        '05' => 'Mai',
        '06' => 'Juin',
        '07' => 'Juillet',
        '08' => 'Août',
        '09' => 'Septembre',
        '10' => 'Octobre',
        '11' => 'Novembre',
        '12' => 'Décembre'
    ];

    public function getOne($id): Estimation
    {
        return Estimation::find($id);
    }

    public function getAll(): Collection
    {
        return Estimation::all();
    }

    public function getAllValidated(): Collection
    {
        return Estimation::whereValidation(true)->whereInvoiceId(null)->get();
    }

    public function getSumValidated()
    {
        $total = DB::table('estimations')
            ->select(DB::raw('SUM(price) as total'))
            ->whereRaw('validation = 1')
            ->whereRaw('invoice_id is null')
            ->get();

        return (count($total) == 0) ? 0 : $total[0]->total;
    }

    public function totalByMonth($clientId): string
    {
        $from = new \DateTime('first day of this month');
        $to = new \DateTime('last day of this month');

        return Estimation::whereBetween('created_at', [$from, $to])->where('client_id', '=', $clientId)->sum('price');
    }

    public function totalByClient($idClient): string
    {
        return Estimation::where('client_id', '=',  $idClient)
            ->sum('price');
    }

    public function sumValidate(): string
    {
        return Estimation::whereValidation(true)->sum('price');
    }

    public function countValidate(): int
    {
        return Estimation::whereValidation(true)->count();
    }

    public function getLastEstimation(): ? string
    {
        return Estimation::all()->count();
    }

    public function updateValidation(int $id): void
    {
        $estimation = Estimation::find($id);

        $estimation->validation = !$estimation->validation;

        $estimation->save();
    }

    public function update(array $datas, int $id): void
    {
        $estimation = Estimation::find($id);
        $estimation->title = $datas['estimation-title'];
        $estimation->body = $datas['estimation-body'];
        $estimation->price = $datas['estimation-amount'];
        $estimation->validation = $datas['estimation-validation'];
        $estimation->contact_id = $datas['estimation-contact'];
        $estimation->service_id = $datas['estimation-service-type'];

        $estimation->save();
    }

    public function save(array $estimationDatas, $number): void
    {
        $estimation = new Estimation();
        $estimation->number = $number;
        $estimation->title = $estimationDatas['estimation-title'];
        $estimation->body = $estimationDatas['estimation-body'];
        $estimation->price = $estimationDatas['estimation-amount'];
        $estimation->validation = $estimationDatas['estimation-validation'];
        $estimation->client_id = $estimationDatas['estimation-client'];
        $estimation->contact_id = $estimationDatas['estimation-contact'];
        $estimation->service_id = $estimationDatas['estimation-service-type'];

        $estimation->save();

    }
}
