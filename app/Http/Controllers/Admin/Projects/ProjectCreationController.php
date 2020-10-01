<?php


namespace App\Http\Controllers\Admin\Projects;


use App\Http\Controllers\Controller;
use App\Http\Requests\Projects\ProjectCreation;
use App\Repository\ClientRepository;
use App\Repository\ProjectRepository;
use App\Repository\ServiceRepository;
use App\Services\Uploads\UploadedFilesService;
use Illuminate\Support\Str;
use Illuminate\View\View;
use Symfony\Component\HttpFoundation\RedirectResponse;

class ProjectCreationController extends Controller
{
    private ProjectRepository $projectRepository;

    private ServiceRepository $serviceRepository;

    private ClientRepository $clientRepository;

    private UploadedFilesService $uploadedFileService;

    /**
     * ProjectCreationController constructor.
     * @param ProjectRepository $projectRepository
     * @param ServiceRepository $serviceRepository
     * @param ClientRepository $clientRepository
     * @param UploadedFilesService $uploadedFileService
     */
    public function __construct(
        ProjectRepository $projectRepository,
        ServiceRepository $serviceRepository,
        ClientRepository $clientRepository,
        UploadedFilesService $uploadedFileService
    ) {
        $this->projectRepository = $projectRepository;
        $this->serviceRepository = $serviceRepository;
        $this->clientRepository = $clientRepository;
        $this->uploadedFileService = $uploadedFileService;
    }


    public function create(): View
    {
        $services = $this->serviceRepository->getAll();
        $clients = $this->clientRepository->getAll();

        return view('bo.admin.projects.project-creation', [
            'services' => $services,
            'clients' => $clients
        ]);
    }

    public function __invoke(ProjectCreation $validator): RedirectResponse
    {
        $validates = $validator->all();

        $this->projectRepository->save($validates);

        if (isset($validates['imagePortfolio'])) {
            $this->uploadedFileService->moveFile(
                $validates['imagePortfolio'],
                'images/uploads/projects/' . Str::slug($validates['project-title'])
            );
        }

        if (isset($validates['image'])) {
            foreach ($validates['image'] as $file) {
                $this->uploadedFileService->moveFile($file, 'images/uploads/projects/' . Str::slug($validates['project-title']));
            }
        }

        return back()->with('success', 'Projet ajouté');
    }
}
