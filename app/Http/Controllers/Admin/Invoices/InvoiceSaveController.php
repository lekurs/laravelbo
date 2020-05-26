<?php


namespace App\Http\Controllers\Admin\Invoices;


use App\Http\Controllers\Controller;
use App\Http\Requests\Invoices\InvoiceCreation;
use App\Repository\EstimationRepository;
use App\Repository\InvoiceRepository;
use Illuminate\Http\RedirectResponse;

class InvoiceSaveController extends Controller
{
    public function save(int $id, InvoiceCreation $validator, InvoiceRepository $repository, EstimationRepository $estimationRepository): RedirectResponse
    {
        $estimation = $estimationRepository->getOne($id);

        $invoice = $validator->all();

        $repository->save($invoice, $estimation);

        return redirect()->route('showClients')->with('success', 'Facture crée');
    }
}
