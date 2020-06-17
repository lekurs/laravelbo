<?php


namespace App\Http\Controllers\Admin\Estimations;


use App\Http\Controllers\Controller;
use App\Http\Requests\Estimations\EstimationEditHandler;
use App\Repository\EstimationRepository;
use App\Repository\ServiceRepository;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class EstimationEditController extends Controller
{
    /**
     * @var EstimationRepository
     */
    private EstimationRepository $estimationRepository;

    /**
     * @var ServiceRepository
     */
    private ServiceRepository $serviceRepository;

    /**
     * EstimationEditController constructor.
     * @param EstimationRepository $estimationRepository
     * @param ServiceRepository $serviceRepository
     */
    public function __construct(EstimationRepository $estimationRepository, ServiceRepository $serviceRepository)
    {
        $this->estimationRepository = $estimationRepository;
        $this->serviceRepository = $serviceRepository;
    }

    public function preSubmit(int $id): View
    {
        $estimation = $this->estimationRepository->getOne($id);
        $services = $this->serviceRepository->getAll();

        return \view('bo.admin.estimations.estimation-edit', [
            'estimation' => $estimation,
            'services' => $services
        ]);
    }

    public function submit(int $id, EstimationEditHandler $validator): RedirectResponse
    {
        $datas = $validator->all();

        $this->estimationRepository->update($datas, $id);

        return redirect()->route('showClients', $id)->with('success', 'Devis modifié');
    }
}
