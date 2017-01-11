<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

class Album extends Model implements Transformable
{
    use TransformableTrait;
    public $table = 'vt_albums';
    protected $fillable = [];

}
