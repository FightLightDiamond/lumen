<?php
/**
 * Created by PhpStorm.
 * User: cuongpm00
 * Date: 10/21/2016
 * Time: 10:07 AM
 */

namespace App\Services;


use Illuminate\Support\Facades\Route;

class MenuService
{
    public function isMenu($group, $char = '.'){
        $routeName = Route::currentRouteName();
        $isChar = strpos($routeName, $char);
        $name = substr( $routeName, 0, $isChar);
        $arrayName = config('menu.'.$group);
        if(count(config('menu.'.$group))== 0){
            $arrayName = [];
        }
        return in_array($name, $arrayName);
    }
    public function isActive($group, $char = '.'){
        if($this->isMenu($group, $char)) return 'active';
        return '';
    }
}