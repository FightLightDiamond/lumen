<?php

namespace App\Entities;

use App\Components\Constants\ConstComm;
use App\Components\Constants\ConstDB;
use App\MultiInheritance\ModelsTrait;
use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

class Video extends Model implements Transformable
{
    use TransformableTrait;
    use ModelsTrait;

    public $table = 'videos';
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';

    public $fillable = [
        'name',
        'latin_name',
        'file',
        'image',
        'singer_name',
        'latin_singer_name',
        'price',
        'is_active',
        'is_download',
        'listen_no',
        'listen_no',
        'download_no',
        'share_no',
        'created_by',
        'updated_by'
    ];

    //===============================RELATION=======================================>

    public function tag()
    {
        return $this->belongsToMany(Tag::class, 'video_tags', 'id', 'tag_id');
    }
    public function singer()
    {
        return $this->belongsToMany(Singer::class, 'video_singers', 'video_id', 'singer_id');
    }
    public function author()
    {
        return $this->belongsToMany(Author::class, 'video_authors', 'video_id', 'author_id');
    }
    public function RingBackTone()
    {
        return $this->belongsToMany(RingBackTone::class, 'video_ring_back_tones', 'video_id', 'ring_back_tone_id');
    }
    public function topic()
    {
        return $this->belongsToMany(Topic::class, 'video_topics', 'video_id', 'topic_id');
    }
    public function category()
    {
        return $this->belongsToMany(Categories::class, 'video_categories', 'video_id', 'category_id');
    }
    public function icon()
    {
        return $this->belongsToMany(Icon::class, 'video_icons', 'video_id', 'icon_id');
    }

    //===================================SCOPE==============================================>

    public function scopeFilter($query, $input)
    {
        if (isset($input['name']) && ($input['name'] != ''))
        {
            $name = trim($input['name']);
            $query->where(function ($query) use ($name)
            {
                $query->where($this->table . '.name', 'LIKE', '%' . $name . '%')
                    ->orWhere($this->table . '.latin_name', 'LIKE', '%' . $name . '%');
            });
        }
        if (isset($input['singer_name']) && $input['singer_name'] != '')
        {
            $singer = trim($input['singer_name']);
            $query->where(function ($query) use ($singer)
            {
                $query->where($this->table . '.singer_name', 'LIKE', '%' . $singer . '%')
                    ->orWhere($this->table . '.latin_singer_name', 'LIKE', '%' . $singer . '%');
            });
        }
        if (isset($input['is_hot']) && $input['is_hot'] != '')
        {
            $query->where('is_hot', $input['is_hot']);
        }
        if (isset($input['is_active']) && $input['is_active'] != '')
        {
            $query->where('is_active', $input['is_active']);
        }

        return $query;
    }
    public function scopeOrder($query, $input)
    {
        if (isset($input['order_by'])) {
            $query->orderBy($this->table . '.' . $input['order_by'], $input['order']);
        }
        if (!isset($input['order_by'])) {
            $query->orderBy($this->table . '.updated_at', 'DESC');
        }
        return $query;
    }

    //==================================ACTION===============================================>

    protected $upload = [
        'image_path' => 1,
        'path' => 0,
        'path_4g' => 0,
        'wap_path' => 0
    ];
    protected $pathUpload = [
        'image_path' => 'video/images',
        'path' => 'video',
        'path_4g' => 'video',
        'wap_path' => 'video'
    ];

    /**
     * Config upload new version v1.1
     * @var array
     */
    protected $thumbImage = [
        'image_path' => [
            'images/images_thumb/f_sata11/video/images' => [
                [200, 113], [147, 83], [390, 220]
            ]
        ]
    ];

    protected $checkbox = ['is_active', 'is_hot'];

}