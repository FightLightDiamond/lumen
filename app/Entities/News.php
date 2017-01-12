<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

class News extends Model implements Transformable
{
    use TransformableTrait;

    protected $fillable = [
        'title',
        'intro',
        'content',
        'is_active',
        'emotional',
        'hot'
    ];

    public function tag(){
        return $this->belongsToMany(Tag::class, 'new_tags', 'new_id', 'tag_id');
    }

    /**
     * Upload
     * @var array
     */
    protected $upload = [
        'main_thumb_path' =>1,
        'sub_thumb_path' =>1,
        'top_home_path' =>1,
        'right_home_path' =>1
    ];
    protected $pathUpload = [
        'main_thumb_path' => 'images/tintuc',
        'sub_thumb_path'=>'images/tintuc',
        'top_home_path'=>'images/tintuc',
        'right_home_path'=>'images/tintuc',
    ];
    protected $thumbPath = [
        'images/images_thumb/f_sata11/images/tintuc',
        'images/images_thumb/f_sata11/images/tintuc',
        'images/images_thumb/f_sata11/images/tintuc'
    ];
    protected $thumbSize = [[132, 83], [147, 83], [355, 220]];

    public $checkbox = ['is_active', 'is_hot'];

    public function scopeFilter($query, $input){
        if(isset($input['title']))
        {
            $query->where('title', 'like', '%'.trim($input['title']).'%');
        }
        return $query;
    }

    public function scopeOrder($query, $input){
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
}
