<?php

namespace App\Entities;

use App\MultiInheritance\ModelsTrait;
use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

class Icon extends Model implements Transformable
{
    use TransformableTrait;
    use ModelsTrait;
    protected $fillable = [];

}
