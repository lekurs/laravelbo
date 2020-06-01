<?php


namespace App\Helper\ImageHelper;


use Illuminate\Http\UploadedFile;
use Illuminate\Support\Str;

class ImageHelper
{
    private static $w = 400;

    public static function upload($file, $filename, string $path, UploadedFile $uploadedFile): array
    {
        $fileInfo = pathinfo($filename);
        $name = Str::slug($fileInfo["filename"]).".".$fileInfo["extension"];
        $size = getimagesize($uploadedFile);
        $weight = filesize($uploadedFile);

        $uploadedFile->storeAs('images/uploads', $uploadedFile->getClientOriginalName());

        return [
            "name" => $name,
            "relative_path" => asset('/assets/images/uploads/' . $name),
            "absolute_path" => app_path('/assets/images/uploads/' . $name),
            "type_mime" => $size["mime"],
            "weight" => self::__filesize($weight),
            "width" => $size[0],
            "height" => $size[1]
        ];
    }

    public static function rotate($file, $angle){
        $parseURL = parse_url($file);
        $filepath = getcwd() . '/'.trim($parseURL["path"], "/");
        $info = getimagesize($filepath);
        switch($info['mime']){
            case "image/jpeg" :
                self::__rotatejpg($filepath, $angle);
                break;
            case "image/png" :
                self::__rotatepng($filepath, $angle);
                break;
        }

        $size = getimagesize($filepath);
        $weight = filesize($filepath);
        $fileInfo = pathinfo($filepath);

        return [
            "name" => $fileInfo["basename"],
            "relative_path" => $parseURL["path"],
            "absolute_path" =>  $filepath,
            "type_mime" => $size["mime"],
            "weight" => self::__filesize($weight),
            "width" => $size[0],
            "height" => $size[1]
        ];
    }

    public static function save($file, $rect){
        $parseURL = parse_url($file);
        $filepath = getcwd() . '/' .trim($parseURL["path"], "/");
        $info = getimagesize($filepath);


        $transform = [
            "dst_x" => 0,
            "dst_y" => 0,
            "src_w" => round($info[0] * ($rect[3] - $rect[1])),
            "src_h" => round($info[1] * ($rect[2] - $rect[0])),
            "src_x" => round($info[0] * $rect[1]),
            "src_y" => round($info[1] * $rect[0]),
            "dst_w" => round($info[0] * ($rect[3] - $rect[1])),
            "dst_h" => round($info[1] * ($rect[2] - $rect[0]))
        ];


        switch($info['mime']){
            case "image/jpeg" :
                self::__cropjpg($filepath, $transform);
                break;
            case "image/png" :
                self::__croppng($filepath, $transform);
                break;
        }

        $size = getimagesize($filepath);
        $weight = filesize($filepath);
        $fileInfo = pathinfo($filepath);

        return [
            "name" => $fileInfo["basename"],
            "relative_path" => $parseURL["path"],
            "absolute_path" =>  $filepath,
            "type_mime" => $size["mime"],
            "weight" => self::__filesize($weight),
            "width" => $size[0],
            "height" => $size[1],
            "alt" => $fileInfo["basename"]
        ];
    }

    private static function __filesize($size) {
        $units = array( 'o', 'Ko', 'Mo', 'Go', 'To', 'Po', 'Eo', 'Zo', 'Yo');
        $power = $size > 0 ? floor(log($size, 1024)) : 0;
        return number_format($size / pow(1024, $power), 2, '.', ',') . ' ' . $units[$power];
    }

    private static function __rotatejpg($file, $angle){
        $image = imagecreatefromjpeg($file);

        // Use imagerotate() function to rotate the image
        $img = imagerotate($image, $angle, 0);

        imagejpeg($img, $file, 100);
    }

    private static function __rotatepng($file, $angle){
        $image = imagecreatefrompng($file);

        // Use imagerotate() function to rotate the image
        $img = imagerotate($image, $angle, 0);

        imagepng($img, $file, 0);
    }

    private static function __cropjpg($file, $transform){

        $image_p = imagecreatetruecolor($transform["dst_w"], $transform["dst_h"]);
        $image = imagecreatefromjpeg($file);
        imagecopyresampled($image_p, $image, $transform["dst_x"], $transform["dst_y"], $transform["src_x"], $transform["src_y"],$transform["dst_w"] , $transform["dst_h"], $transform["src_w"], $transform["src_h"]);

        imagejpeg($image_p, $file, 100);
    }

    private static function __croppng($file, $transform){
        $image_p = imagecreatetruecolor($transform["dst_w"], $transform["dst_h"]);
        $image = imagecreatefrompng($file);
        imagecopyresampled($image_p, $image, $transform["dst_x"], $transform["dst_y"], $transform["src_x"], $transform["src_y"],$transform["dst_w"] , $transform["dst_h"], $transform["src_w"], $transform["src_h"]);

        imagepng($image_p, $file, 0);
    }
}
