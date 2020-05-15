<?php


namespace App\Http\Controllers\Admin\Navigation;


use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class NavigationSaveController extends Controller
{
    public function save(Request $request)
    {
        dd($request->get());
    }
}
