<?php
/**
 * Created by PhpStorm.
 * User: e
 * Date: 1/7/17
 * Time: 1:40 PM
 */

namespace App\MultiInheritance;


trait RepositoriesTrait
{
    public function getByIdentify($identify)
    {
        return $this->makeModel()->where('identify', $identify)->limit(1)->get();
    }
}