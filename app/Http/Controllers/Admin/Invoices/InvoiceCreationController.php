<?php


namespace App\Http\Controllers\Admin\Invoices;


use App\Http\Controllers\Controller;
use App\Repository\EstimationRepository;
use Illuminate\View\View;

class InvoiceCreationController extends Controller
{
    public function create(int $id, EstimationRepository $estimationRepository): View
    {
        $estimation = $estimationRepository->getOne($id);

        return view('bo.admin.invoices.invoice-create', [
           'estimation' => $estimation
        ]);
    }
}
