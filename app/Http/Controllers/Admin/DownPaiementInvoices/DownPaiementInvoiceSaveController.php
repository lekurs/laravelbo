<?php


namespace App\Http\Controllers\Admin\DownPaiementInvoices;


use App\Http\Controllers\Controller;
use App\Http\Requests\DownInvoices\DownInvoiceCreation;
use App\Repository\DownPaiementInvoiceRepository;
use App\Repository\EstimationRepository;

class DownPaiementInvoiceSaveController extends Controller
{
    public function save(int $idEstimation, EstimationRepository $repository, DownPaiementInvoiceRepository $invoiceRepository, DownInvoiceCreation $validator)
    {
        $estimation = $repository->getOne($idEstimation);

        $datas = $validator->all();

        $invoiceRepository->saveDownPaimentInvoice($datas, $estimation);

        return response()->redirectToRoute('showClients')->with('success', 'Facture d\'acompte créée');
    }
}
