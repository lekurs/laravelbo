<?php


namespace App\Http\Controllers\Admin\Dashboard;


use App\Http\Controllers\Controller;
use App\Repository\InvoiceRepository;

class DashboardAPIController extends Controller
{
    public function getCAByYear(InvoiceRepository $invoiceRepository)
    {
        $month = [
            '01' => 'Janvier',
            '02' => 'Février',
            '03' => 'Mars',
            '04' => 'Avril',
            '05' => 'Mai',
            '06' => 'Juin',
            '07' => 'Juillet',
            '08' => 'Août',
            '09' => 'Septembre',
            '10' => 'Octobre',
            '11' => 'Novembre',
            '12' => 'Décembre',
        ];

        $invoicesMonth = [];
        $datas = [];
        array_unshift($datas, ['mois', 'Web', 'Print']);

        foreach ($invoiceRepository->getAllWithCA() as $invoice) {
            $invoicesMonth[$invoice->month][$invoice->client_category_id] = $invoice->ca;
        }

        foreach ($month as $idMonthNum => $libelle) {
            array_push($datas,
                [$month[$idMonthNum],
                    (isset($invoicesMonth[$idMonthNum][1]) ? floatval($invoicesMonth[$idMonthNum][1]) : 0),
                    (isset($invoicesMonth[$idMonthNum][2]) ? floatval($invoicesMonth[$idMonthNum][2]) : 0)
                ]);
        }

        return response()->json($datas);
    }
}
