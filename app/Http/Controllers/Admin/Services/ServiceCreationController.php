<?php


namespace App\Http\Controllers\Admin\Services;


use App\Http\Controllers\Controller;
use Illuminate\View\View;

class ServiceCreationController extends Controller
{
    public function creation(): View
    {
        return view('bo.admin.services.service_creation');
    }
}
