<?php

namespace App\Entities;

use App\MultiInheritance\ModelsTrait;
use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

class Topic extends Model implements Transformable
{
    use TransformableTrait;
    use ModelsTrait;
    protected $fillable = [
        'name', 'latin_name', 'image', 'background_image', 'is_active'
    ];

    //===============================RELATION=======================================>

    public function song()
    {
        return $this->belongsToMany(Song::class, 'song_topics', 'topic_id', 'song_id');
    }
    public function video()
    {
        return $this->belongsToMany(Video::class, 'video_topics', 'topic_id', 'video_id');
    }
    public function album()
    {
        return $this->belongsToMany(Album::class, 'album_topics', 'topic_id', 'album_id');
    }

    //===============================SCOPE========================================>

    public function scopeFilter($query, $input){
        if(isset($input['name']) && $input['name'] != '')
        {
            $query
                ->where('name', 'LIKE', '%'.trim($input['name']).'%')
                ->orWhere('latin_name', 'LIKE', '%'.trim($input['name']).'%');
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

    //==================================ACTION===================================>

    protected  $checkbox = ['is_hot', 'is_active'];
    public function checkbox($input)
    {
        foreach($this->checkbox as $value)
        {
            isset($input[$value]) ? $input[$value] = 1 : $input[$value] = 0;
        }
        return $input;
    }
    protected   $upload = ['icon_path' => 1, 'image_path'=> 1];
    protected  $pathUpload = ['icon_path' => 'images', 'image_path' => 'images'];

}
