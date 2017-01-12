<?php

/**
 * Created by PhpStorm.
 * User: e
 * Date: 1/7/17
 * Time: 1:36 PM
 */
namespace App\MultiInheritance;

use App\Entities\User;

trait ModelsTrait
{
    //=====================RELATION============================>

    public function user_create()
    {
        return $this->belongsTo(User::class, 'created_by');
    }
    public function user_update()
    {
        return $this->belongsTo(User::class, 'updated_by');
    }

    //======================SCOPE===============================>

    public function scopeOrders($query, $input = [])
    {
        foreach ($input as $field => $value)
        {
            $query->orderBy($this->table.'.'.$field, $value);
        }
        return $query;
    }
}