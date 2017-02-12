<?php
/**
 * Created by PhpStorm.
 * User: cuongpm00
 * Date: 8/23/2016
 * Time: 4:08 PM
 */

namespace App\Services;


class FormatService
{
    public function indexPaginate($k, $data){
        return ($data->currentPage()-1)*$data->perPage()+$k+1;
    }
    public function removeChar($content, $char = ' '){
        $i = true;
        while($i){
            $i =  $isChar = strpos($content, $char);
            $content = str_replace( ' ', '', $content );
        }
        return $content;
    }
    public function dateTime($data, $format = 'd-m-Y'){
        return date_format(date_create($data), $format);
    }
    public function slug($str){
        return str_slug($this->vn_str_filter($str));
    }
    function vn_str_filter ($str){
        $unicode = array(
            'a'=>'á|à|ả|ã|ạ|ă|ắ|ặ|ằ|ẳ|ẵ|â|ấ|ầ|ẩ|ẫ|ậ',
            'd'=>'đ',
            'e'=>'é|è|ẻ|ẽ|ẹ|ê|ế|ề|ể|ễ|ệ',
            'i'=>'í|ì|ỉ|ĩ|ị',
            'o'=>'ó|ò|ỏ|õ|ọ|ô|ố|ồ|ổ|ỗ|ộ|ơ|ớ|ờ|ở|ỡ|ợ',
            'u'=>'ú|ù|ủ|ũ|ụ|ư|ứ|ừ|ử|ữ|ự',
            'y'=>'ý|ỳ|ỷ|ỹ|ỵ',
            'A'=>'Á|À|Ả|Ã|Ạ|Ă|Ắ|Ặ|Ằ|Ẳ|Ẵ|Â|Ấ|Ầ|Ẩ|Ẫ|Ậ',
            'D'=>'Đ',
            'E'=>'É|È|Ẻ|Ẽ|Ẹ|Ê|Ế|Ề|Ể|Ễ|Ệ',
            'I'=>'Í|Ì|Ỉ|Ĩ|Ị',
            'O'=>'Ó|Ò|Ỏ|Õ|Ọ|Ô|Ố|Ồ|Ổ|Ỗ|Ộ|Ơ|Ớ|Ờ|Ở|Ỡ|Ợ',
            'U'=>'Ú|Ù|Ủ|Ũ|Ụ|Ư|Ứ|Ừ|Ử|Ữ|Ự',
            'Y'=>'Ý|Ỳ|Ỷ|Ỹ|Ỵ',
        );
        foreach($unicode as $nonUnicode=>$uni){
            $str = preg_replace("/($uni)/i", $nonUnicode, $str);
        }
        return $str;
    }

    public static function getPlainText($input, $length){
        $input = str_replace(array("\r\n", "\r"), "\n", strip_tags($input));
        $lines = explode("\n", $input);
        $newLines = array();

        foreach ($lines as $i => $line) {
            if(!empty($line))
                $newLines[] = trim($line);
        }
        $input = implode($newLines);
        return htmlentities(substr($input, 0, $length), ENT_COMPAT, 'UTF-8');
    }
    public function formatNameFile($name){
        $arrayElement = explode('.', $name);
        $type  = array_pop($arrayElement);
        return str_random(20).uniqid().'.'.$type;
    }
}