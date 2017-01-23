<?php
/**
 * Created by PhpStorm.
 * User: Fight Light Diamond
 * Date: 7/25/2016
 * Time: 10:12 PM
 */
namespace App\Services;

use App\Events\LogUploadEvent;
use App\Helper\LinkHelper;
use Intervention\Image\Facades\Image;

class UploadService
{
    public function file($input, $path)
    {
        $originalName = $input->getClientOriginalName();
        $filename = app('format')->formatNameFile($originalName);
        if (!file_exists($path)) {
            mkdir($path, 755, true);
        }
        $input->move($path, $filename);
        $path = $path .'/'. $filename;
        chmod($path, 0666);
       // $path = str_replace(env('PREFIX_UPLOAD'), "", $path);
        //event(new LogUploadEvent($path, "FILE"));
        return $path;
    }

    public function images($input, $path, $thumbImage)
    {

        $filename = app('format')->formatNameFile($input->getClientOriginalName());
        if (!file_exists($path)) {
            mkdir($path, 0755, true);
        }
        $input->move($path, $filename);
        $path = $path .'/'. $filename;
        chmod($path, 0666);

        $this->thumbImages($path, $filename, $thumbImage);

        $path = str_replace(env('PREFIX_UPLOAD'), "", $path);
        //event(new LogUploadEvent($path));
        return $path;
    }

    private function thumbImages($path, $filename, $thumbImage)
    {
        $arrayThumb = explode('.', $filename);
        foreach ($thumbImage as $folder => $sizes) {
            foreach ($sizes as $size) {
                $this->processRender($path, $size, $arrayThumb, $folder);
            }
        }
    }

    private function processRender($path, $size, $arrayThumb, $folder)
    {
        $pathThumb = $this->buildThumbPath($size, $arrayThumb, $folder);
        Image::make($path)->resize($size[0], $size[1])->save($pathThumb);
        chmod($pathThumb, 0666);
        // event(new LogUploadEvent($pathThumb, 'THUMB', 0666));
    }

    private function buildThumbPath($size, $arrayThumb, $folder)
    {
        $sizer = '_' . implode('_', $size) . '.';
        $fileName = implode($sizer, $arrayThumb);
        return LinkHelper::generatePath($folder, 1) . $fileName;
    }

    public function rendThumb($path, $filename, $size, $folder)
    {
        $arrayThumb = explode('.', $filename);
        $pathThumb = $this->buildThumbPath($size, $arrayThumb, $folder);
        Image::make($path)->resize($size[0], $size[1])->save($pathThumb);
        chmod($pathThumb, 0666);
    }
}