<?php

namespace App\Entities;

use App\MultiInheritance\ModelsTrait;
use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

class FlashHot extends Model implements Transformable
{
    use TransformableTrait;
    use ModelsTrait;

    protected $fillable = [
        'image', 'link', 'is_active'
    ];


    public function scopeOrder($query, $input)
    {
        if(isset($input['order_by']))
        {
            $query->orderBy($input['order_by'], $input['order']);
        }
        if(!isset($input['order_by']))
        {
            $query->orderBy('id', 'DESC');
        }
        return $query;
    }

    protected $upload = ['image_path' => 1 , 'thumb_path' => 1];
    protected $pathUpload = [
        'image_path' => 'images/tintuc',
        'thumb_path' => 'images/tintuc'
    ];
}
