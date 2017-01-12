<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

class RingBackTone extends Model implements Transformable
{
    use TransformableTrait;

    protected $fillable = [
        'name', 'code', 'is_active'
    ];

    protected  $checkbox = ['is_hot', 'is_active', 'status'];

    public function singer()
    {
        return $this->belongsToMany(Video::class, 'video_ring_back_tones', 'ring_back_tone_id', 'video_id');
    }
    public function author()
    {
        return $this->belongsToMany(Song::class, 'song_ring_back_tones', 'ring_back_tone_id', 'song_id');
    }

    public function scopeFilter($query, $input)
    {
        if(isset($input['name']) && $input['name'] != '')
        {
            $query->where('name', 'LIKE', '%'.trim($input['name']).'%');
        }
        if(isset($input['alias_name']) && $input['alias_name'] != '')
        {
            $query->where('name', 'LIKE', '%'.trim($input['alias_name']).'%');
        }
        if(isset($input['code']) && $input['code'] != '')
        {
            $query->where('code', 'LIKE', '%'.trim($input['code']).'%');
        }
        if(isset($input['is_active']) && $input['is_active'] != '')
        {
            $query->where('is_active', $input['is_active']);
        }
        if(isset($input['is_hot']) && $input['is_hot'] != '')
        {
            $query->where('is_hot', $input['is_hot']);
        }
        return $query;
    }

}
