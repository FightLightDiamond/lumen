<?php
/**
 * Created by PhpStorm.
 * User: cuongpm00
 * Date: 9/8/2016
 * Time: 9:30 AM
 */

namespace App\Services;


class InputViewService
{
    public function dateTimePicker($name = 'date_time', $id = 'date_time',  $value = null, $class='', $attr=''){
        $input = "<div class='input-group date' id='$id'>";
        $input .=    "<input type='text' name='".$name."' value='".isset($value)?$value:old($name)."' $attr class='form-control $class' />";
        $input .=    '<span class="input-group-addon">';
        $input .=   '<span class="glyphicon glyphicon-calendar">';
        $input .=      '</span>';
        $input .=  '</span>';
        $input .= '</div>';
        return $input;
    }
    public function is_toggle($id, $is, $class='toggleActive'){
        if($is == 1 || $is == true)
            return '<span data="'.$id.'" class="text-success '.$class.'"><i class="glyphicon glyphicon-ok"></i></span>';
        return '<span data="'.$id.'" class=" '.$class.'"><i class="glyphicon glyphicon-remove"></i></span>';
    }
}