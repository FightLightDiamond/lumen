<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

class Album extends Model implements Transformable
{
    use TransformableTrait;
    public $table = 'albums';
    protected $fillable = [
        'name',
        'image',
        'is_active',
        'listen_no',
        'download_no'
    ];

    //=====================================RELATION======================================>

    public function user_create(){
        return $this->belongsTo(User::class, 'created_by');
    }
    public function user_update(){
        return $this->belongsTo(User::class, 'updated_by');
    }

    public function tag(){
        return $this->belongsToMany(Tag::class, 'album_tags', 'album_id', 'tag_id');
    }
    public function singer(){
        return $this->belongsToMany(Singer::class, 'album_singers', 'album_id', 'singer_id');
    }
    public function song(){
        return $this->belongsToMany(Song::class, 'album_songs', 'album_id', 'song_id');
    }
    public function author(){
        return $this->belongsToMany(Author::class, 'album_authors', 'album_id', 'author_id');
    }
    public function topic(){
        return $this->belongsToMany(Topic::class, 'album_topics', 'album_id', 'topic_id');
    }
    public function category(){
        return $this->belongsToMany(Categories::class, 'album_categories', 'album_id', 'category_id');
    }
    public function icon(){
        return $this->belongsToMany(Icon::class, 'album_icons', 'album_id', 'icon_id');
    }

    //=====================================SCOPE======================================>

    public function scopeFilter($query, $input)
    {
        if(isset($input['name']) && ($input['name']!=''))
        {
            $name = trim($input['name']);
            $query->where(function($query) use($name)
            {
                $query->where($this->table.'.name', 'LIKE', '%'.$name.'%')
                    ->orWhere($this->table.'.name_unsign', 'LIKE', '%'.$name.'%');
            });
        }
        if(isset($input['singer']) && $input['singer'] != '')
        {
            $singer = trim($input['singer']);
            $query->where(function($query)use($singer)
            {
                $query->where($this->table.'.search_info', 'LIKE', '%'.$singer.'%')
                    ->orWhere($this->table.'.search_info_unsign', 'LIKE', '%'.$singer.'%');
            });
        }
        if(isset($input['is_hot']) && $input['is_hot'] != '')
        {
            $query->where('is_hot', $input['is_hot']);
        }
        if(isset($input['is_active'])&& $input['is_active']!='')
        {
            $query->where('is_active', $input['is_active']);
        }
        return $query;
    }
    public function scopeOrder($query, $input){
        if(isset($input['order_by']))
        {
            $query->orderBy($this->table.'.'.$input['order_by'], $input['order']);
        }
        if(!isset($input['order_by']))
        {
            $query->orderBy($this->table.'.updated_at', 'DESC');
        }
        return $query;
    }

    //=====================================ACTION======================================>

    protected $upload = [
        'image_path' => 1,
        'image_album' => 1
    ];
    protected $pathUpload = [
        'image_path'=> 'album/image',
        'image_album'=>'album/image'
    ];

    /**
     * Config upload new version v1.1
     * @var array
     */
    protected $thumbImage = [
        'image_path' => [
            'images/images_thumb/f_sata11/album/image' => [
                [103, 103], [208, 208], [300, 300], [46, 46]
            ]
        ],
        'image_album' => [
            'images/images_thumb/f_sata11/album/image' => [
                [103, 103], [208, 208], [300, 300], [46, 46]
            ]
        ]
    ];

    protected $checkbox = ['is_hot', 'is_active', 'is_sub', 'is_preview'];

    public function checkbox($input)
    {
        foreach($this->checkbox as $value)
        {
            isset($input[$value])? $input[$value] = 1: $input[$value] = 0;
        }
        return $input;
    }

}
