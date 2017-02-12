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
    private $fileName = null;
    private $basePath = null;
    private $pathUploaded = null;
    private $hiddenFolder = '/var/www/html/lumen-api/storage/uploads';
    public function file($input, $basePath)
    {
        $this->basePath = $basePath;
        $originalName = $input->getClientOriginalName();
        $this->fileName = app('format')->formatNameFile($originalName);
        $input->move($basePath, $this->fileName);
        $this->pathUploaded = $basePath . '/' . $this->fileName;
        chmod($this->pathUploaded, 0777);
        $path = str_replace($this->hiddenFolder, "", $this->pathUploaded);
        //event(new LogUploadEvent($path, "FILE"));
        return $path;
    }

    public function images($input, $basePath, $thumbImage)
    {
        $path = $this->file($input, $basePath);
        $this->saveThumbs($thumbImage);
        return $path;
    }

    private function saveThumbs($thumbImage)
    {
        foreach ($thumbImage as $folder => $sizes) {
            foreach ($sizes as $size) {
                $this->savingThumb($size, $folder);
            }
        }
    }

    private function savingThumb($size, $folder)
    {
        $thumbPath = $this->getThumbPath($size, $folder);
        Image::make($this->pathUploaded)->resize($size[0], $size[1])->save($thumbPath);
        chmod($thumbPath, 0777);
        // event(new LogUploadEvent($thumbPath, 'THUMB', 0777));
    }

    private function getThumbPath($size, $folder)
    {
        $sizeImage = '_' . implode('_', $size) . '.';
        $fileName = str_replace('.', $sizeImage, $this->fileName);
        $folderEnd = $this->basePath . $folder;
        if (!file_exists($folderEnd)) {
            mkdir($folderEnd, 0777, true);
        }
        return $folderEnd . $fileName;
    }
}