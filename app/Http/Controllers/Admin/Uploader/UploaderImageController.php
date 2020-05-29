<?php


namespace App\Http\Controllers\Admin\Uploader;


use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class UploaderImageController extends Controller
{
    public function uploadImg(Request $request)
    {

        $photo = $request->file('image');

        $photo->storeAs('images/uploads', $photo->getClientOriginalName());

//        dd(getimagesize(storage_path('app/images/uploads/').$photo->getClientOriginalName()));
        $imgWidth = getimagesize(storage_path('app/images/uploads/').$photo->getClientOriginalName())[0];
        $imgHeight = getimagesize(storage_path('app/images/uploads/').$photo->getClientOriginalName())[1];

        $datas = ['url' => storage_path('app/images/uploads/').$photo->getClientOriginalName(), 'size' => [
            $imgWidth,
            $imgHeight
        ]];


        return response()->json($datas);
    }
}
