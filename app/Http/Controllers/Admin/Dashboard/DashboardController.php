<?php


namespace App\Http\Controllers\Admin\Dashboard;


use App\Http\Controllers\Controller;
use App\Repository\ClientRepository;
use App\Repository\EstimationRepository;
use App\Repository\InvoiceRepository;
use Illuminate\View\View;

class DashboardController extends Controller
{
    public function show(ClientRepository $clientRepository, EstimationRepository $estimationRepository, InvoiceRepository $invoiceRepository): View
    {
        $datas = $clientRepository->getAllWithEstimationsValidate();

        $estimations = $estimationRepository->countValidate();

        $invoices = $invoiceRepository->countNotPaid();

//        $estimationsWithInvoices = $estimationRepository->getAllInvoicesByType();
//
//        $tab = [];
//
//        foreach ($estimationsWithInvoices as $estimation) {
//            foreach ($estimation->clientCategory()->get() as $cat) {
//                $tab[] = $cat->type;
//            }
//        }

        $clientTab = [];

        foreach ($datas as $data)
        {
            foreach ($data->estimations as $estimation) {

                $clientTab[$data->name] = $estimation->price;
            }
        }

        return \view('bo.dashboard.dashboard', [
            'clientTab' => $clientTab,
            'totalEstimations' => $estimations,
            'totalInvoices' => $invoices,
//            'estimationsWithInvoices' => $estimationsWithInvoices
        ]);
    }
}
