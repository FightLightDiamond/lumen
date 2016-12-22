<?php
/**
 * Created by PhpStorm.
 * User: cuongpm00
 * Date: 9/8/2016
 * Time: 9:44 AM
 */

namespace App\Services;


class InputJsService
{
    public function dateTimePicker($id = 'date_time', $format = 'YYYY-MM-DD HH:mm:ss'){
        return "$(function () { $('#".$id."').datetimepicker({  format: '$format'  });});";
    }
}