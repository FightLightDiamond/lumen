<?php

namespace App\Entities;

use App\MultiInheritance\ModelsTrait;
use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

class Categories extends Model implements Transformable
{
    use TransformableTrait;
    use ModelsTrait;

    protected $fillable = [
        'name',
        'latin_name',
        'image',
        'background_image',
        'is_active'
    ];

    //=========================RELATION===========================>

    public function song()
    {
        return $this->belongsToMany(Song::class, 'song_categories', 'category_id', 'song_id');
    }
    public function video()
    {
        return $this->belongsToMany(Video::class, 'video_categories', 'category_id', 'video_id');
    }
    public function album()
    {
        return $this->belongsToMany(Album::class, 'video_categories', 'category_id', 'video_id');
    }

    //=========================SCOPE===========================>

    public function scopeFilter($query, $input)
    {
        if(isset($input['name']) && $input['name'] != '')
        {
            $query
                ->where('name', 'LIKE', '%'.trim($input['name']).'%')
                ->orWhere('latin_name', 'LIKE', '%'.trim($input['latin_name']).'%');
        }
        if(isset($input['is_active'])&& $input['is_active']!='')
        {
            $query->where('is_active', $input['is_active']);
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
            $query->orderBy('id', 'DESC');
        }
        return $query;
    }

}
