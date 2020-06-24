<?php


namespace App\Http\Controllers\Admin\Estimations;


use App\Http\Controllers\Controller;
use App\Repository\EstimationRepository;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class EstimationGetAllController extends Controller
{
    /**
     * @var EstimationRepository
     */
    private EstimationRepository $estimationRepository;

    /**
     * EstimationGetAllController constructor.
     * @param EstimationRepository $estimationRepository
     */
    public function __construct(EstimationRepository $estimationRepository)
    {
        $this->estimationRepository = $estimationRepository;
    }


    public function getAll(): View
    {
        $user = Auth::user();
        $roles = $user->roles;

//        dd(Auth::guard('admin'));

//        if (Auth::guard('admin')->attempt(['password' => $user->getAuthPassword()])) {
//            dd('ok');
//        }
        $estimations = $this->estimationRepository->getAll();

        return \view('bo.admin.estimations.estimation-all', [
            'estimations' => $estimations
        ]);
    }
}
