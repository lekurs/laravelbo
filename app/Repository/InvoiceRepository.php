<?php


namespace App\Repository;


use App\Http\Entity\Estimation;
use App\Http\Entity\Invoice;
use App\Repository\interfaces\InvoiceRepositoryInterface;

class InvoiceRepository implements InvoiceRepositoryInterface
{
    public function getOne($id): Invoice
    {
        return Invoice::find($id);
    }

    public function sumAllInvoices(int $clientId)
    {
        return Invoice::where('client_id', '=', $clientId)->get();
    }

    public function totalByMonth(int $clientId): string
    {
        $from = new \DateTime('first day of this month');
        $to = new \DateTime('last day of this month');

        return Invoice::whereBetween('created_at', [$from, $to])->where('client_id', '=', $clientId)->sum('amount');
    }

    public function totalByClient($idClient): string
    {
        return Invoice::where('client_id', '=',  $idClient)
            ->sum('amount');
    }

    public function countNotPaid(): int
    {
        return Invoice::wherePaid(false)->count();
    }

    public function save(array $datas, Estimation $estimation): void
    {
        $invoice = new Invoice();
        $invoice->number = $datas['invoice-number'];
        $invoice->title = $datas['invoice-title'];
        $invoice->amount = $datas['invoice-price'];
        $invoice->client_id = $estimation->client_id;


        $invoice->save();

        $estimation->invoice_id = $invoice->id;
        $estimation->save();
    }
}
