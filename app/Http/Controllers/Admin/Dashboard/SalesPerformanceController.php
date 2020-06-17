<?php


namespace App\Http\Controllers\Admin\Dashboard;


use App\Http\Controllers\Controller;
use App\Repository\EstimationRepository;
use App\Repository\InvoiceRepository;
use Illuminate\View\View;

class SalesPerformanceController extends Controller
{
    /**
     * @var InvoiceRepository
     */
    private $invoiceRepository;

    /**
     * @var EstimationRepository
     */
    private $estimationRepository;

    /**
     * SalesPerformanceController constructor.
     * @param InvoiceRepository $invoiceRepository
     * @param EstimationRepository $estimationRepository
     */
    public function __construct(InvoiceRepository $invoiceRepository, EstimationRepository $estimationRepository)
    {
        $this->invoiceRepository = $invoiceRepository;
        $this->estimationRepository = $estimationRepository;
    }


    public function show(): View
    {
        $estimations = $this->estimationRepository->getAllValidated();
        $invoicesNotPaid = $this->invoiceRepository->getAllNotPaid();
        $totalInvoicesNotPaid = $this->invoiceRepository->getSumNotPaid();
        $totalEstimationsValidated = $this->estimationRepository->getSumValidated();
        $totalCa = $this->invoiceRepository->getTotalByYear();

//        dd($totalCa);

        return \view('bo.dashboard.sales-performance', [
            'estimations' => $estimations,
            'invoicesNotPaid' => $invoicesNotPaid,
            'totalInvoicesNotPaid' => $totalInvoicesNotPaid,
            'totalEstimationsValidated' => $totalEstimationsValidated,
            'totalCa' => $totalCa
        ]);
    }
}
