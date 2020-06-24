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
}
