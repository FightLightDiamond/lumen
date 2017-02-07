<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

class OfferSetupDetail extends Model implements Transformable
{
    use TransformableTrait;

    protected $fillable = [ 'offer_setup_id', 'type', 'status'];

}
