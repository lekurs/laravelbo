<?php


namespace App\Repository;


use App\Http\Entity\Service;
use Illuminate\Database\Eloquent\Collection;

class ServiceRepository
{
    public function getAll(): Collection
    {
        return Service::orderBy('libelle', 'ASC')->get();
    }

    public function getone($id): Service
    {
        return Service::find($id);
    }

    public function save(array $datas): void
    {
        $service = new Service();
        $service->libelle = $datas['service-wording'];
        $service->description = $datas['service-description'];
        $service->icon = $datas['service-icon'];

        $service->save();
    }
}
