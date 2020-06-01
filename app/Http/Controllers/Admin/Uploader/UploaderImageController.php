<?php


namespace App\Http\Controllers\Admin\Uploader;


use App\Helper\ImageHelper\ImageHelper;
use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class UploaderImageController extends Controller
{
    public function uploadImg(Request $request): JsonResponse
    {
        $file = $request->file('image');
        $image = ImageHelper::upload($file->getFilename(), $file->getClientOriginalName(), storage_path('app/images/uploads/'), $file);

        $datas = ['url' => $image['relative_path'], 'size' => [$image["width"], $image["height"]]];

        return response()->json($datas);
    }

    public function rotateImg(Request $request): JsonResponse
    {
        $file = $request->get('url');
        $angle = ($request->get('direction') == 'CW') ? 90 : -90;

        $image = ImageHelper::rotate($file, $angle);

        $datas = ['url' => $image['relative_path'], 'size' => [$image['width'], $image['height']]];

        return response()->json($datas);
    }

    public function saveImg(Request $request): JsonResponse
    {
        $file = $request->get('url');
        $rect = explode(',', $request->get('crop'));

        $image = ImageHelper::save($file, $rect);

        $datas = ['url' => $image['relative_path'], 'size' => [$image['width'], $image['height']], 'alt' => $image['alt']];

        return response()->json($datas);
    }
}
