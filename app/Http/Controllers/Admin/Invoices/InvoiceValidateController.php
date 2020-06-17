<?php


namespace App\Http\Controllers\Admin\Invoices;


use App\Http\Controllers\Controller;
use App\Repository\InvoiceRepository;
use Illuminate\Http\JsonResponse;

class InvoiceValidateController extends Controller
{
    /**
     * @var InvoiceRepository
     */
    private $invoiceRepo;

    /**
     * InvoiceValidateController constructor.
     * @param InvoiceRepository $invoiceRepo
     */
    public function __construct(InvoiceRepository $invoiceRepo)
    {
        $this->invoiceRepo = $invoiceRepo;
    }

    public function validation(string $id): JsonResponse
    {
        $total = $this->invoiceRepo->validationInvoice($id);

        return response()->json($total);
    }
}
