<?php

/**
 * Created by PhpStorm.
 * User: e
 * Date: 1/7/17
 * Time: 1:36 PM
 */
namespace App\MultiInheritance;

trait ModelsTrait
{
    public function scopeOrders($query, $input = [])
    {
        foreach ($input as $field => $value)
        {
            $query->orderBy($this->table.'.'.$field, $value);
        }
        return $query;
    }
}