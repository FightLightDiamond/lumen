<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

class Author extends Model implements Transformable
{
    use TransformableTrait;

    protected $fillable = [
        'alias_name',
        'real_name',
        'gender',
        'information',
        'image',
        'is_active'
    ];

    //=============================RELATION================================>

    public function song()
    {
        return $this->belongsToMany(Song::class, 'song_authors', 'author_id', 'song_id');
    }
    public function video()
    {
        return $this->belongsToMany(Video::class, 'video_authors', 'author_id', 'video_id');
    }

    //=============================SCOPE================================>

    public function scopeFilter($query, $input)
    {
        if(isset($input['alias_name']) && $input['alias_name'] != '') {
            $query->where('alias_name', 'LIKE', '%'.trim($input['alias_name']).'%');
        }
        if(isset($input['real_name']) && $input['real_name'] != '')
        {
            $query->where('real_name', 'LIKE', '%'.trim($input['real_name']).'%');
        }
        if (isset($input['gender']) && $input['gender'] != '')
        {
            $query->where('gender', $input['gender']);
        }
        if (isset($input['is_active']) && $input['is_active'] != '')
        {
            $query->where('is_active', $input['is_active']);
        }
        return $query;
    }

    //=============================ACTION================================>

    protected $upload = ['image_path' => 1];
    protected $pathUpload = ['image_path'=>'author'];

    /**
     * Config upload new version v1.1
     * @var array
     */
    protected $thumbImage = [
        'image_path' => [
            'images/images_thumb/f_sata11/singer' => [
                [103, 103], [310, 310], [300, 300]
            ],
            'medias/images/images_thumb/f_medias_6/singer' =>[
                [103, 103], [310, 310], [300, 300]
            ]
        ]
    ];

    protected $checkbox = ['is_active'];

    public function checkbox($input)
    {
        foreach ($this->checkbox as $value)
        {
            isset($input[$value]) ? $input[$value] = 1 : $input[$value] = 0;
        }
        return $input;
    }
}
