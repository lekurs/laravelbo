<?php


namespace App\Http\Controllers\Admin;


use App\Http\Controllers\Controller;
use Illuminate\View\View;

class AdminController extends Controller
{
    public function show(): View
    {
        return view('bo.admin');
    }
}
