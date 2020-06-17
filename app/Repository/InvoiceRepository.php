<?php


namespace App\Repository;


use App\Http\Entity\Estimation;
use App\Http\Entity\Invoice;
use App\Repository\interfaces\InvoiceRepositoryInterface;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\DB;

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

    public function getAllNotPaid(): Collection
    {
        return Invoice::wherePaid(false)->get();
    }

    public function totalByMonth(int $clientId): string
    {
        $from = new \DateTime('first day of this month');
        $to = new \DateTime('last day of this month');

        return Invoice::whereBetween('created_at', [$from, $to])->where('client_id', '=', $clientId)->sum('amount');
    }

    public function totalByClient($idClient): string
    {
        return Invoice::whereClientId($idClient)
            ->sum('amount');
    }

    public function getTotalByYear()
    {
        $date = date('Y');

        $total = DB::table('invoices')
            ->select(DB::raw('SUM(amount) as total'))
            ->whereRaw('paid = 1')
            ->whereRaw('DATE_FORMAT(invoices.created_at, "%Y") = ' . $date . '')
            ->get();

        return (count($total) == 0) ? 0 : $total[0]->total;
    }

    public function getSumNotPaid(): string
    {
        return Invoice::wherePaid(false)
            ->sum('amount');
    }

    public function countNotPaid(): int
    {
        return Invoice::wherePaid(false)->count();
    }

    public function getAllByMonth(): Collection
    {
        return Invoice::orderBy('created_at', 'ASC')->wherePaid(true)->get();
    }

    public function getAllWithCA(): \Illuminate\Support\Collection
    {
        $date = date('Y');
        return
        DB::table('invoices')
            ->select(DB::raw('DATE_FORMAT(invoices.created_at, "%m") as month,  sum(invoices.amount) as ca, service_id'))
            ->join('estimations', 'invoices.id', '=', 'invoice_id')
            ->whereRaw('DATE_FORMAT(invoices.created_at, "%Y") = ' . $date . '')
            ->groupBy(DB::raw('DATE_FORMAT(invoices.created_at, "%m"), service_id'))
            ->get();
    }

    public function getMaxInvoices(): ? string
    {
        return Invoice::all()->count();
    }

    public function getSumInvoices()
    {
        $total = DB::table('invoices')
            ->select(DB::raw('SUM(amount) as total'))
            ->whereRaw('paid = 0')
            ->get();

        return (count($total) == 0) ? 0 : $total[0]->total;
    }

    public function validationInvoice(string $id)
    {
        $invoice = Invoice::find($id);
        $invoice->paid = !$invoice->paid;
        $invoice->save();

        return $this->getSumInvoices();
    }

    public function update(array $datas, int $id): void
    {
        $invoice = Invoice::whereId($id)->first();

        $invoice->title = $datas['invoice-title'];
        $invoice->amount = $datas['invoice-price'];

        $invoice->save();
    }

    public function save(array $datas, Estimation $estimation, string $number): void
    {
        $invoice = new Invoice();
        $invoice->number = $number;
        $invoice->title = $datas['invoice-title'];
        $invoice->amount = $datas['invoice-price'];
        $invoice->client_id = $estimation->client_id;


        $invoice->save();

        $estimation->invoice_id = $invoice->id;
        $estimation->save();
    }
}
