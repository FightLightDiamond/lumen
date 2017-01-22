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

    public function image($input, $path, $thumbPath = [], $thumbSize = []){
        $filename = app('format')->formatNameFile($input->getClientOriginalName());
        if(!file_exists($path)){
            mkdir($path, 0755, true);
        }
        $input->move($path, $filename);
        $path = $path.$filename;
        chmod($path, 0666);
        $this->imageThumb($path, $filename, $thumbPath, $thumbSize);
        //$path = str_replace(env('PREFIX_UPLOAD'),"" , $path);
       // event(new LogUploadEvent($path));
        return $path;
    }

    public function imageThumb($path, $filename, $thumbPaths, $thumbSizes){
        $arrayThumb = explode('.', $filename);
        foreach($thumbPaths as $key => $folder)
        {
            $size = '_'.implode('_', $thumbSizes[$key]).'.';
            $fileName = implode($size, $arrayThumb);
            $pathThumb = LinkHelper::generatePath($folder, 1).$fileName;
            Image::make($path)
                ->resize($thumbSizes[$key][0], $thumbSizes[$key][1])
                ->save($pathThumb);
            //event(new LogUploadEvent($pathThumb, 'THUMB', 0666));
            chmod($pathThumb, 0666);
        }
    }

    public function file($input, $path = 'uploads/'){
        $originalName = $input->getClientOriginalName();
        $filename = app('format')->formatNameFile($originalName);
        if(!file_exists($path))
        {
            mkdir($path, 755, true);
        }
        $input->move($path, $filename);
        $path = $path.'/'.$filename;
        chmod($path, 0666);

        //$path = str_replace(env('PREFIX_UPLOAD'),"" , $path);
        //event(new LogUploadEvent($path, "FILE"));
        return $path;
    }
//    public function setFileName(){
//        return str_random(20).uniqid().'.jpg';
//    }
}