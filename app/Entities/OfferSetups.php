<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

class OfferSetups extends Model implements Transformable
{
    use TransformableTrait;

    protected $fillable = [
        'imei', 'phone_number', 'net_news', 'mocha', 'keeng', 'code', 'status'
    ];

}
