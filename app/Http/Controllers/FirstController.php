<?php


namespace App\Http\Controllers;


use App\Navigation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Symfony\Component\Routing\Annotation\Route;

class FirstController extends Controller
{
    public function show ()
    {
        $name = 'Maxime';

        return view('first.first', ['name' => $name]);
    }

    public function showAll()
    {
        $name = 'Maxime';

        $nav = Navigation::all();

        return view('first.show-all-posts', [
            'name' => $name,
            'nav' => $nav
        ]);
    }

    public function form(Request $request)
    {
        $validator = $request->validate([
            'title' => 'required|max:255',
            'body' => 'required',
        ]);

//        if ($validator->fails()) {
//            return redirect('myfirstcontroller')
//                ->withErrors($validator)
//                ->withInput();
//        }

        Navigation::create($validator);

        return redirect()->route('myfirstcontroller');

    }

    public function edit(Request $request, int $id)
    {
        $name = "Maxime";

        $nav = Navigation::find($id);

        if ($request->isMethod('post')) {

            $inputs = $request->all();

            $nav->fill($inputs)->save();

            return redirect()->route('showAllPosts');
        }



        return view('first.editform', ['name' => $name, 'nav' =>$nav]);
    }
}
