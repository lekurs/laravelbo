<?php


namespace App\Http\Controllers\Admin\Invoices;


use App\Http\Controllers\Controller;
use App\Http\Requests\Invoices\InvoiceCreation;
use App\Repository\EstimationRepository;
use App\Repository\InvoiceRepository;
use Illuminate\Http\RedirectResponse;

class InvoiceSaveController extends Controller
{
    /**
     * @var EstimationRepository
     */
    private EstimationRepository $estimationRepository;

    /**
     * @var InvoiceRepository
     */
    private InvoiceRepository $invoiceRepository;

    /**
     * InvoiceSaveController constructor.
     * @param EstimationRepository $estimationRepository
     * @param InvoiceRepository $invoiceRepository
     */
    public function __construct(EstimationRepository $estimationRepository, InvoiceRepository $invoiceRepository)
    {
        $this->estimationRepository = $estimationRepository;
        $this->invoiceRepository = $invoiceRepository;
    }


    public function save(int $id, InvoiceCreation $validator): RedirectResponse
    {
        $estimation = $this->estimationRepository->getOne($id);

        $invoice = $validator->all();

        $last = $this->invoiceRepository->getMaxInvoices();


        if (!is_null($last)) {
            $last = $last +1;
            $number = date('Ym') . '00' . $last ;
        } else {
            $number = date('Ym'). '001';
        }

        $this->invoiceRepository->save($invoice, $estimation, $number);

        return redirect()->route('showClients')->with('success', 'Facture crée');
    }
}
