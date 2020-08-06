<?php


namespace App\Http\Controllers\Admin\Invoices;


use App\Http\Controllers\Controller;
use App\Http\Requests\Invoices\InvoiceEdit;
use App\Repository\InvoiceRepository;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class InvoiceEditController extends Controller
{
    /**
     * @var InvoiceRepository
     */
    private InvoiceRepository $invoiceRepository;

    /**
     * InvoiceEditController constructor.
     * @param InvoiceRepository $invoiceRepository
     */
    public function __construct(InvoiceRepository $invoiceRepository)
    {
        $this->invoiceRepository = $invoiceRepository;
    }

    public function preSubmit(int $id): View
    {
        $invoice = $this->invoiceRepository->getOne($id);

        return view('bo.admin.invoices.edit-invoice', [
            'invoice' => $invoice
        ]);
    }

    public function submit(int $id, InvoiceEdit $validator): RedirectResponse
    {
        $datas = $validator->all();

        $this->invoiceRepository->update($datas, $id);

        return redirect()->route('showClients', $id)->with('success', 'Facture modifiée');
    }
}
