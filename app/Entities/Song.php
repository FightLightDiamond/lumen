<?php

namespace App\Entities;

use App\Components\Constants\ConstDB;
use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

class Song extends Model implements Transformable
{
    use TransformableTrait;

    public $table = 'songs';

    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';

    public $fillable = [
        'name',
        'file',
        'image',
        'lyric',
        'is_active',
        'is_download',
        'listen_no',
        'download_no',
        'share_no',
        'singer_name',
        'price'
    ];

    /**
     * Relationship tag, singer, author, ring back tone, topic, category, icon
     */
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
        return $this->belongsToMany(RingBackTone::class, 'song_ringbacktone', 'song_id', 'RingBacktone_id');
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

    /**
     * Scope
     * @param $query
     * @param $input
     * @return mixed
     */
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
                    ->orWhere($this->table . '.name_unsign', 'LIKE', $name . '%')
                    ->orderBy('name', 'ASC');
            });
        }
        if (isset($input['singer']) && $input['singer'] != '') {
            $singer = trim($input['singer']);
            $query->where(function ($query) use ($singer) {
                $query->where($this->table . '.search_info', 'LIKE', '%' . $singer . '%')
                    ->orWhere($this->table . '.search_info_unsign', 'LIKE', '%' . $singer . '%');
            });
        }

        return $query;
    }

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