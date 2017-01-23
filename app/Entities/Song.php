<?php

namespace App\Entities;

use App\Components\Constants\ConstDB;
use App\MultiInheritance\ModelsTrait;
use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

class Song extends Model implements Transformable
{
    use TransformableTrait;
    use ModelsTrait;

    public $table = 'songs';

    public $fillable = [
        'name',
        'latin_name',
        'file',
        'image',
        'lyric',
        'is_active',
        'is_download',
        'listen_no',
        'download_no',
        'share_no',
        'singer_name',
        'latin_singer_name',
        'price',
        'identify',
        'created_by',
        'updated_by',
    ];

    //==================================RELATION========================================>

    public function tag()
    {
        return $this->belongsToMany(Tag::class, 'song_dm_tag', 'id', 'dm_tag_id');
    }

    public function singer()
    {
        return $this->belongsToMany(Singer::class, 'song_singer', 'song_id', 'singer_id');
    }

    public function author()
    {
        return $this->belongsToMany(Author::class, 'song_author', 'song_id', 'author_id');
    }

    public function RingBackTone()
    {
        return $this->belongsToMany(RingBackTone::class, 'song_ring_back_tone', 'song_id', 'ring_back_tone_id');
    }

    public function topic()
    {
        return $this->belongsToMany(Topic::class, 'song_topic', 'song_id', 'topic_id');
    }

    public function category()
    {
        return $this->belongsToMany(Categories::class, 'song_category', 'song_id', 'category_id');
    }

    public function icon()
    {
        return $this->belongsToMany(Icon::class, 'song_icon', 'song_id', 'icon_id');
    }

    public function recordCopyright()
    {
        return $this->belongsTo(CopyrightProvider::class, 'record_copyright');
    }

    public function authorCopyRight()
    {
        return $this->belongsTo(CopyrightProvider::class, 'author_copyright');
    }

    public function video()
    {
        return $this->belongsTo(Video::class);
    }

    //===================================SCOPE======================================>

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

    public function scopeFilter($query, $input)
    {
        if (isset($input['is_active']) && ($input['is_active']) !== '') {
            $query->where($this->table . '.is_active', $input['is_active']);
        }
        if (isset($input['name']) && ($input['name'] != '')) {
            $name = trim($input['name']);
            $query->where(function ($query) use ($name) {
                $query->where($this->table . '.name', 'LIKE', $name . '%')
                    ->orWhere($this->table . '.latin_name', 'LIKE', $name . '%')
                    ->orderBy('name', 'ASC');
            });
        }
        if (isset($input['singer_name']) && $input['singer_name'] != '') {
            $singer = trim($input['singer_name']);
            $query->where(function ($query) use ($singer) {
                $query->where($this->table . '.singer_name', 'LIKE', '%' . $singer . '%')
                    ->orWhere($this->table . '.latin_singer_name', 'LIKE', '%' . $singer . '%');
            });
        }
        return $query;
    }

    //====================================ACTION============================================>
    protected $upload = [
        'file' => 0,
        'image' => 1,
    ];
    protected $pathUpload = [
        'file' => '/audio',
        'image' => '/image',
    ];

    protected $thumbImage = [
        'image_path' => [
            'images/images_thumb/f_sata11/song/images' => [
                [300, 300], [103, 103], [310, 310]
            ]
        ],
        'image_face' => [
            'images/images_thumb/f_sata11/song/images' => [
                [470, 246]
            ]
        ]
    ];
    protected $checkbox = ['is_active', 'is_download'];

}