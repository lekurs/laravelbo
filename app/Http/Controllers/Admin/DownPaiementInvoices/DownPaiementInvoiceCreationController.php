<?php


namespace App\Http\Controllers\Admin\DownPaiementInvoices;


use App\Http\Controllers\Controller;
use App\Repository\EstimationRepository;
use Illuminate\View\View;

class DownPaiementInvoiceCreationController extends Controller
{
    public function show(int $idEstimation, EstimationRepository $repository): View
    {
        $estimation = $repository->getOne($idEstimation);

//        dd($estimation);

        return view('bo.admin.down_paiment_invoices.down-paiement-invoice-create', [
            'estimation' => $estimation
        ]);
    }
}
