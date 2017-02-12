<?php
/**
 * Created by PhpStorm.
 * User: e
 * Date: 12/17/16
 * Time: 9:55 AM
 */

namespace App\Services;


class ReflectionService
{
    protected $reflection;
    public function __construct($class)
    {
        $this->reflection = new \ReflectionClass($class);
    }
    public function getName(){
        return $this->reflection->getName();
    }
    public function getParameterConstruct(){
        return $this->reflection->getConstructor()->getParameters()[0]->getClass()->getName();
    }
}