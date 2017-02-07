<?php
/**
 * Created by PhpStorm.
 * User: e
 * Date: 12/23/16
 * Time: 9:26 AM
 */

namespace App;


use Illuminate\Database\Eloquent\Model;

class Quote extends Model
{
    protected $fillable = [
        'name', 'quote'
    ];
}