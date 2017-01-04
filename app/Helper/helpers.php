<?php
/**
 * Created by IntelliJ IDEA.
 * User: huynq28
 * Date: 8/24/2016
 * Time: 4:53 PM
 */
use Monolog\Logger;
use Monolog\Handler\StreamHandler;

/**
 * Check if an object exist in a collection
 * @param $object
 * @param $collection
 * @return bool
 */
function isInCollection($object, $collection)
{
    $result = false;
    foreach ($collection as $item) {
        if ($item->id == $object->id) {
            $result = true;
            break;
        }
    }
    return $result;

}

function isInAssociativeArray($id, $array)
{
    $result = false;
    foreach ($array as $key => $value) {
        if ($id == $key) {
            $result = true;
            break;
        }
    }
    return $result;
}

function log4dev($info)
{
    $logger = new Logger('dev');
    $logger->pushHandler(new StreamHandler(storage_path('logs/dev.log'), Logger::INFO));
    $logger->addInfo(json_encode($info));
}

function getThumbUrl($sourceImg, $width = null, $height = null, $type = '', $resource = null)
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
    if (count($arrSource) > 1) {
        $source = $arrSource[rand(0, (count($arrSource) - 1))];
    }

    $domain_server = config('config.image_host');

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

function removeEmailDomain($email)
{
    return str_replace("@viettel.com.vn", "", $email);
}

/**
 * Get type sort of any field
 *
 * @param $data
 * @param $field
 * @return string
 */
function getTypeSort($data, $field)
{
    $result = 'fa-sort';

    if ($data['order_by'] === $field) {
        $result = ($data['order'] === 'ASC') ? 'fa-sort-asc' : 'fa-sort-desc';
    }

    return $result;
}

/**
 * Format datetime follow type
 *
 * @param $type
 * @return string
 */
function dateFormat($str, $type)
{
    $result = \App\Components\Constants\ConstView::DATETIME_DEFAULT;
    switch ($type) {
        case \App\Components\Constants\ConstView::DATETIMETYPE: // yyyy-mm-dd H:i:s
            if ($str !== '' && isset($str)) {
                $result = \Carbon\Carbon::parse($str)->format('Y-m-d H:i:s');
            }
            break;
        case \App\Components\Constants\ConstView::DATETYPE: // yyyy-mm-dd
            if ($str !== '' && isset($str)) {
                $result = \Carbon\Carbon::parse($str)->format('Y-m-d');
            }
            break;
    }
    return $result;
}

/**
 * @param $value
 * @return string
 */
function formatPercent($value)
{
    return number_format($value * 100, \App\Components\Constants\ConstView::DECIMALS);
}

/**
 * Format float
 *
 * @param $value
 * @param $decimal
 * @return string
 */
function formatDecimal($value)
{
    return number_format($value, \App\Components\Constants\ConstView::DECIMALS);
}

/**
 * Check if permission user has any permission or has permission SUPER_ADMIN
 *
 * @param $permissions
 * @return bool
 */
function hasanycan($permissions)
{
    if (Auth::getUser()->can(\App\Components\Constants\ConstComm::PERMISSIONS['SUPER_ADMIN'])) {
        return true;
    }
    foreach ($permissions as $permission) {
        if (Auth::getUser()->can($permission)) {
            return true;
        }
    }
    return false;
}
