<?php


namespace App\Http\Controllers\Admin\Estimations;


use App\Http\Controllers\Controller;
use App\Http\Requests\Estimations\EstimationCreation;
use App\Repository\EstimationRepository;
use Illuminate\Http\RedirectResponse;

class EstimationStoreController extends Controller
{
    private $estimationRepository;

    /**
     * EstimationStoreController constructor.
     * @param EstimationRepository $estimationRepository
     */
    public function __construct(EstimationRepository $estimationRepository)
    {
        $this->estimationRepository = $estimationRepository;
    }

    /**
     * @param EstimationCreation $validator
     * @return RedirectResponse
     */
    public function store(EstimationCreation $validator): RedirectResponse
    {
        $last = $this->estimationRepository->getLastEstimation();
        $datas = $validator->all();

        if (!is_null($last)) {
            $last = $last+1;
            $number = date('Ym') . '00' . $last ;
        } else {
            $number = date('Ym'). '001';
        }


        $this->estimationRepository->save($datas, $number);

        return redirect()->route('showClients')->with('success', 'devis ajouté');
    }
}
