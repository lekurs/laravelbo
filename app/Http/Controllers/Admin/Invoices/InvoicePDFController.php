<?php


namespace App\Http\Controllers\Admin\Invoices;


use App\Http\Controllers\Controller;
use App\Repository\InvoiceRepository;
use Spipu\Html2Pdf\Html2Pdf;

class InvoicePDFController extends Controller
{
    /**
     * @var InvoiceRepository
     */
    private $invoiceRepository;

    /**
     * InvoicePDFController constructor.
     * @param InvoiceRepository $invoiceRepository
     */
    public function __construct(InvoiceRepository $invoiceRepository)
    {
        $this->invoiceRepository = $invoiceRepository;
    }


    public function create(int $id)
    {
        $invoice = $this->invoiceRepository->getOne($id);
        $pdf = new Html2Pdf();
        $pdf->addFont('aristaproalternateextralight', '', 'aristaproalternateextralight.php');
        $pdf->addFont('Assistant', '', 'Assistant.php');
        $pdf->addFont('aristaproalternate', '', 'aristaproalternate.php');
        $pdf->writeHTML(view('bo.admin.estimations.estimation-pdf', [
            'invoice' => $invoice,
        ]));
        $pdf->output();
    }
}
