<?php
/**
 * Created by PhpStorm.
 * User: Fight Light Diamond
 * Date: 7/25/2016
 * Time: 10:12 PM
 */
namespace App\Services;
use App\Events\LogUploadEvent;
use Intervention\Image\Facades\Image;

class UploadService
{
    public function file($input, $path)
    {
        $originalName = $input->getClientOriginalName();
        $formatName = app('format')->formatNameFile($originalName);
        $input->move($path, $formatName);
        $path = $path .'/'. $formatName;
        chmod($path, 0777);
       // $path = str_replace(env('PREFIX_UPLOAD'), "", $path);
        //event(new LogUploadEvent($path, "FILE"));
        return $path;
    }

    public function images($input, $path, $thumbImage)
    {
        $pathUploaded = $this->file($input, $path);
        //$this->thumbImages($path, $pathUploaded, $formatName, $thumbImage);
        //chmod($path, 0777);
       // $path = str_replace(env('PREFIX_UPLOAD'), "", $path);
        //event(new LogUploadEvent($path));
        return $pathUploaded;
    }

    private function thumbImages($path, $pathUploaded, $formatName, $thumbImage)
    {
        $arrayThumb = explode('.', $formatName);
        foreach ($thumbImage as $folder => $sizes) {
            foreach ($sizes as $size) {
                $this->processRender($path, $pathUploaded, $size, $arrayThumb, $folder);
            }
        }
    }

    private function processRender($path, $pathUploaded, $size, $arrayThumb, $folder)
    {
        $pathThumb = $this->buildThumbPath($path, $size, $arrayThumb, $folder);
        echo $pathThumb."<br>";
        echo $size[0].'-'.$size[1].'<br>';
        Image::make($pathUploaded)->resize($size[0], $size[1])->save($pathThumb);
        chmod($pathThumb, 0777);
        // event(new LogUploadEvent($pathThumb, 'THUMB', 0777));
    }

    private function buildThumbPath($path, $size, $arrayThumb, $folder)
    {
        $sizer = '_' . implode('_', $size) . '.';
        $formatName = implode($sizer, $arrayThumb);
        if (!file_exists($path.$folder)) {
            mkdir($path.$folder, 0777, true);
        }
        return $path.$folder. $formatName;
    }

    private function rendThumb($path, $formatName, $size, $folder)
    {
        $arrayThumb = explode('.', $formatName);
        $pathThumb = $this->buildThumbPath($path, $size, $arrayThumb, $folder);
        Image::make($path)->resize($size[0], $size[1])->save($pathThumb);
        chmod($pathThumb, 0777);
    }
}