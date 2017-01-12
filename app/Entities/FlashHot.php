<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

class FlashHot extends Model implements Transformable
{
    use TransformableTrait;

    protected $fillable = [
        'image', 'link', 'is_active'
    ];

    public function scopeFilter($query, $input){
        if(isset($input['title']) && $input['title'] != '')
        {
            $query->where('title', 'LIKE', '%'.trim($input['title']).'%');
        }
        return $query;
    }

    public function scopeOrder($query, $input)
    {
        if(isset($input['order_by']))
        {
            $query->orderBy($input['order_by'], $input['order']);
        }
        if(!isset($input['order_by']))
        {
            $query->orderBy('published_time', 'DESC');
        }
        return $query;
    }

    protected $upload = ['image_path' => 1 , 'thumb_path' => 1];
    protected $pathUpload = [
        'image_path' => 'images/tintuc',
        'thumb_path' => 'images/tintuc'
    ];
}
