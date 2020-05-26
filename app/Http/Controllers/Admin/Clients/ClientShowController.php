<?php


namespace App\Http\Controllers\Admin\Clients;


use App\Http\Controllers\Controller;
use App\Http\Entity\Invoice;
use App\Repository\ClientRepository;
use App\Repository\EstimationRepository;
use App\Repository\InvoiceRepository;
use Illuminate\View\View;

class ClientShowController extends Controller
{
    public function showOne($slug, ClientRepository $repository,EstimationRepository $estimationRepository, InvoiceRepository $invoiceRepository): View
    {
        $client = $repository->getOneBySlugWithEstimations($slug);

        $sumInvoiceOnMonth = $invoiceRepository->totalByMonth($client->id);

        $totalInvoices = count($invoiceRepository->sumAllInvoices($client->id));

        $totalCA = $invoiceRepository->totalByClient($client->id);

        return view('bo.admin.clients.client-show-one', [
            'client' => $client,
            'sumInvoiceOnMonth' => $sumInvoiceOnMonth,
            'totalEstimation' => $totalCA,
            'totalInvoices' => $totalInvoices
        ]);
    }
}
