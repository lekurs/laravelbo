<?php


namespace App\Http\Controllers\Admin\Estimations;


use App\Http\Controllers\Controller;
use App\Repository\EstimationRepository;
use Spipu\Html2Pdf\Html2Pdf;

class EstimationPDFController extends Controller
{
    public function create(int $id, EstimationRepository $repository): Html2Pdf
    {

//        dd(  public_path('/assets/fontsphp/AristaProAlternate-ExtraLight.php'));
//        dd( public_path('/assets/fontsphp/AristaProAlternate-ExtraLight.php'));
        $estimation = $repository->getOne($id);
        $pdf = new Html2Pdf();
        $pdf->addFont('AristaProAlternate-ExtraLight', 'normal', public_path('/images/mout/fontsphp/AristaProAlternate-ExtraLight.php'));
//        $pdf->setDefaultFont('AristaProAlternate-ExtraLight');
        $pdf->writeHTML(view('bo.admin.estimations.estimation-pdf', [
            'estimation' => $estimation,
        ]));
        $pdf->output();
    }
}
