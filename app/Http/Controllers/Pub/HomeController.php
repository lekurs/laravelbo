<?php


namespace App\Http\Controllers\Pub;


use App\Http\Controllers\Controller;

class HomeController extends Controller
{
    public function home()
    {
        return view('public.home', [

        ]);
    }
}
