<?php


namespace App\Http\Controllers\Admin\Estimations;


use App\Http\Controllers\Controller;
use App\Repository\EstimationRepository;
use Spipu\Html2Pdf\Html2Pdf;

class EstimationPDFController extends Controller
{
    public function create(int $id, EstimationRepository $repository)
    {
        $estimation = $repository->getOne($id);
        $pdf = new Html2Pdf();
        $pdf->addFont('aristaproalternateextralight', '', 'aristaproalternateextralight.php');
        $pdf->addFont('Assistant', '', 'Assistant.php');
        $pdf->addFont('aristaproalternate', '', 'aristaproalternate.php');
        $pdf->writeHTML(view('bo.admin.estimations.estimation-pdf', [
            'estimation' => $estimation,
        ]));
        $pdf->output();
    }
}
