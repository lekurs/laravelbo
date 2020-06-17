<?php


namespace App\Http\Controllers\Admin\Invoices;


use App\Http\Controllers\Controller;
use App\Repository\InvoiceRepository;
use Illuminate\View\View;

class InvoiceOneController extends Controller
{
    /**
     * @var InvoiceRepository
     */
    private $invoiceRepository;

    /**
     * InvoiceOneController constructor.
     * @param $invoiceRepository
     */
    public function __construct(InvoiceRepository $invoiceRepository)
    {
        $this->invoiceRepository = $invoiceRepository;
    }


    public function show(string $id): View
    {
        $invoice = $this->invoiceRepository->getOne($id);

//        dd($invoice->estimations->first()->title);

        return view('bo.admin.invoices.invoice-one', [
            'invoice' => $invoice,

        ]);
    }
}
