<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

class VtAlbum extends Model implements Transformable
{
    use TransformableTrait;
    public $table = 'vt_albums';
    protected $fillable = [];

}
