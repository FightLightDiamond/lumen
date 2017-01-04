<?php

/**
* Description of LinkHelper
* @author
*/
namespace App\Helper;

class LinkHelper
{
    public static function getThumbUrl($sourceImg, $width = null, $height = null, $type = '', $resource = null)
    {
        switch ($type) {
            case 'video':
                $defaultImage = config('config.video_default_image');
                break;
            case 'banner':
                $defaultImage = config('config.banner_default_image');
                break;
            case 'album':
                $defaultImage = config('config.default_image');
                break;
            default:
                $defaultImage = config('config.default_image');
        }
        //hien thi random image cho ca sy
        $arrSource = explode("$", $sourceImg);
        $source = $arrSource[0];
        if(count($arrSource) > 1)
            $source = $arrSource[rand(0, (count($arrSource) - 1))];

        if (strpos($source, '/sata11/') === 0) {
            $domain_server = config('config.image_server_new.domain');
        } else {
            $domain_server = config('config.image_server.domain');
        }

        if ($width == null && $height == null) {
            return $domain_server . str_replace('/medias_6', '/medias', $source);
        }

        if (empty($source)) {
            $defaultImage = str_replace('www.', '', $defaultImage);
            //$defaultImage = str_replace('http://', 'http://vip.', $defaultImage);
            return $defaultImage;
        }

        //Begin: Tra ve domain vip cho Discover neu ton tai $resource
        if (isset($resource)) {
            $domain_server = str_replace('http://', 'http://vip.', str_replace('www.', '', $domain_server));
        }
        //End

        $pos = strrpos($source, '/');
        if ($pos !== false) {
            $filename = substr($source, $pos + 1);

            if (strpos($source, '/sata11/') === 0) {
                $dir = $domain_server . '/sata11/images/images_thumb' . '/f_' . substr($source, 1, $pos);
            } else {
                $dir = $domain_server . '/medias/images/images_thumb' . '/f_' . substr($source, 1, $pos);
            }

        } else {
            return $defaultImage;
        }

        $pos = strrpos($filename, '.');
        if ($pos !== false) {
            $basename = substr($filename, 0, $pos);
            $extension = substr($filename, $pos + 1);
        } else {
            return $defaultImage;
        }

        if ($width == null) {
            $thumbName = $basename . '_auto_' . $height . '.' . $extension;
        } elseif ($height == null) {
            $thumbName = $basename . '_' . $width . '_auto.' . $extension;
        } else {
            $thumbName = $basename . '_' . $width . '_' . $height . '.' . $extension;
        }

        $link = $dir . $thumbName;
        return $link;
    }

    public static function generatePath($path = "medias", $isImage = 1)
    {
        $baseFolder = env("IMAGE_FOLDER_PATH");
        if ($isImage == 0){
            $listFolders = explode(",", env("MEDIA_FOLDERS_PATH"));
            $time = substr(date('Y-m-d H:i:s', time()), 8, 2);
            $baseFolder = $listFolders[$time%count($listFolders)];
        }
        $yearFolder = $baseFolder . $path . '/'. date('Y') . '/';
        $monthFolder = $yearFolder . date('m'). '/';
        $dayFolder = $monthFolder . date('d') . "/";

        if (!is_dir($yearFolder)) {
            @mkdir($yearFolder, 0777, true);
            chmod($yearFolder, 0777);
        }

        if (!is_dir($monthFolder)) {
            @mkdir($monthFolder, 0777, true);
            chmod($monthFolder, 0777);
        }

        if (!is_dir($dayFolder)) {
            @mkdir($dayFolder, 0777, true);
            chmod($dayFolder, 0777);
        }
        return $dayFolder;
    }

    public static function getRealUrl($sourceImg)
    {
        //hien thi random image cho ca sy
        $arrSource = explode("$", $sourceImg);
        $source = $arrSource[0];
        if(count($arrSource) > 1){
            $source = $arrSource[rand(0, count($arrSource) - 1)];
        }

        $link = config('config.image_host') . str_replace('/medias_6', '/medias', $source);
        $link = str_replace('medias2', 'medias', $link);

        return $link;
    }

    public static function getMediaWapLink($video)
    {
        return LinkHelper::getMediaLink($video, "WAP");
    }

    public static function getMediaLink($media, $type = "WEB")
    {
        $isAudio = self::endswith(strtolower($media->path), ".mp3");
        $link = ($isAudio ? env("audio_host") : env("media_host")) . ($type == "WEB" ? $media->path : $media->wap_path) . "?source=".$type."&type=" . ($isAudio ? "song" : "video"). "&id=" .$media->id;
        return $link;
    }

    public static function endswith($string, $test) {
        $strlen = strlen($string);
        $testlen = strlen($test);
        if ($testlen > $strlen) return false;
        return substr_compare($string, $test, $strlen - $testlen, $testlen) === 0;
    }
}
