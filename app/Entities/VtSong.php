<?php

namespace App\Entities;

use App\Components\Constants\ConstDB;
use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

class VtSong extends Model implements Transformable
{
    use TransformableTrait;

    public $table = 'vt_songs';

    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';

    public $fillable = [
        'name',
        'lyric',
        'is_active',
        'listen_no',
        'path',
        'path_4g',
        'like_no',
        'download_no',
        'published_time',
        'name_unsign',
        'lyric_unsign',
        'identify',
        'slug',
        'created_by',
        'updated_by',
        'singer_info',
        'wap_path',
        'price',
        'seo_title',
        'seo_description',
        'seo_keywords',
        'slug_new',
        'lyric_translate',
        'record_copyright',
        'author_copyright',
        'is_download',
        'image_path',
        'is_quocte',
        'status',
        'reason',
        'doc_quyen',
        'phu_luc',
        'doi_soat',
        'search_info',
        'search_info_unsign',
        'song_type',
        'total_like',
        'total_status',
        'total_shared',
        'is_charge',
        'video_id',
        'video_info',
        'is_search_mocha',
        'listen_no_fake',
        'image_face',
        'boost_score'
    ];


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
                $query->where($this->table . '.search_info', 'LIKE', '%' .$singer . '%')
                    ->orWhere($this->table . '.search_info_unsign', 'LIKE', '%' .$singer . '%');
            });
        }

        // Check role user if is role is CP_SONG, only show song created by this user
        if (!\Auth::getUser()->can(ConstComm::PERMISSIONS['ADMIN_SONG']) &&
            \Auth::getUser()->can(ConstComm::PERMISSIONS['CP_SONG'])) {
            $query->where('created_by', \Auth::getUser()->id);
        }
        return $query;
    }

    public function audio()
    {
        return '<audio src="' . env("cdn_audio_address") . $this->path . '" controls>' .
        '<source src="' . env("cdn_audio_address") . $this->path . '" type="audio/mpeg">' .
        'Your browser does not support the audio element.' .
        '</audio>';
    }

    public function audio4g()
    {
        return '<audio src="' . env("cdn_audio_address") . $this->path_4g . '" controls>' .
        '<source src="' . env("cdn_audio_address") . $this->path_4g . '" type="audio/mpeg">' .
        'Your browser does not support the audio element.' .
        '</audio>';
    }

    /**
     * Relationship tag, singer, author, ring back tone, topic, category, icon
     */
    public function tag()
    {
        return $this->belongsToMany(VtDmTag::class, 'vt_song_dm_tag', 'id', 'dm_tag_id');
    }

    public function singer()
    {
        return $this->belongsToMany(VtSinger::class, 'vt_song_singer', 'song_id', 'singer_id');
    }

    public function author()
    {
        return $this->belongsToMany(VtAuthor::class, 'vt_song_author', 'song_id', 'author_id');
    }

    public function RingBackTone()
    {
        return $this->belongsToMany(VtRingBackTone::class, 'vt_song_ringbacktone', 'song_id', 'RingBacktone_id');
    }

    public function topic()
    {
        return $this->belongsToMany(VtTopic::class, 'vt_song_topic', 'song_id', 'topic_id');
    }

    public function category()
    {
        return $this->belongsToMany(VtCategories::class, 'vt_song_category', 'song_id', 'category_id');
    }

    public function icon()
    {
        return $this->belongsToMany(VtIcon::class, 'vt_song_icon', 'song_id', 'icon_id');
    }

    public function recordCopyright()
    {
        return $this->belongsTo(VtCopyrightProvider::class, 'record_copyright');
    }

    public function authorCopyRight()
    {
        return $this->belongsTo(VtCopyrightProvider::class, 'author_copyright');
    }

    public function video()
    {
        return $this->belongsTo(VtVideo::class);
    }

    /**
     * Scope
     * @param $query
     * @param $input
     * @return mixed
     */
    public function scopeOrder($query, $input)
    {
        if (isset($input['order_by'])) $query->orderBy($this->table . '.' . $input['order_by'], $input['order']);
        if (!isset($input['order_by'])) $query->orderBy($this->table . '.updated_at', 'DESC');
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

    protected $checkbox = ['doi_soat', 'is_active', 'is_fanpage', 'is_preview', 'is_download', 'is_ring_tone', 'is_quocte', 'is_search_mocha'];

    /**
     * Accessor
     */
    public function getPublishedTimeAttribute($value)
    {
        return ($value === ConstDB::DEFAULT_DATETIME) ? '' : $value;
    }

    /**
     * Mutator
     */
    public function setNameAttribute($value)
    {
        $this->attributes['name'] = (trim($value));
    }

    public function setVideoInfoAttribute($value)
    {
        $this->attributes['video_info'] = (trim($value));
    }

    public function setLyricAttribute($value)
    {
        $this->attributes['lyric'] = (trim($value));
    }

    public function setListenNoAttribute($value)
    {
        $this->attributes['listen_no'] = (trim($value));
    }

    public function setListenNoDayAttribute($value)
    {
        $this->attributes['listen_no_day'] = (trim($value));
    }

    public function setListenNoWeekAttribute($value)
    {
        $this->attributes['listen_no_week'] = (trim($value));
    }

    public function setPathAttribute($value)
    {
        $this->attributes['path'] = (trim($value));
    }

    public function setDownloadNoAttribute($value)
    {
        $this->attributes['download_no'] = (trim($value));
    }

    public function setBitRateAttribute($value)
    {
        $this->attributes['bit_rate'] = (trim($value));
    }

    public function setNameUnsignAttribute($value)
    {
        $this->attributes['name_unsign'] = (trim($value));
    }

    public function setLyricUnsignAttribute($value)
    {
        $this->attributes['lyric_unsign'] = (trim($value));
    }

    public function setSlugAttribute($value)
    {
        $this->attributes['slug'] = (trim($value));
    }

    public function setLengthAttribute($value)
    {
        $this->attributes['length'] = (trim($value));
    }

    public function setSingerInfoAttribute($value)
    {
        $this->attributes['singer_info'] = (trim($value));
    }

    public function setLocatePathAttribute($value)
    {
        $this->attributes['locate_path'] = (trim($value));
    }

    public function setWapPathMonoAttribute($value)
    {
        $this->attributes['wap_path_mono'] = (trim($value));
    }

    public function setLyricTranslateAttribute($value)
    {
        $this->attributes['lyric_translate'] = (trim($value));
    }

    public function setIsPreviewAttribute($value)
    {
        $this->attributes['is_preview'] = (trim($value));
    }

    public function setPreviewPathAttribute($value)
    {
        $this->attributes['preview_path'] = (trim($value));
    }

    public function setRecordCopyrightAttribute($value)
    {
        $this->attributes['record_copyright'] = (trim($value));
    }

    public function setAuthorCopyrightAttribute($value)
    {
        $this->attributes['author_copyright'] = (trim($value));
    }

    public function setImagePathAttribute($value)
    {
        $this->attributes['image_path'] = (trim($value));
    }

    public function setCachePathAttribute($value)
    {
        $this->attributes['cache_path'] = (trim($value));
    }

    public function setCachePathWapAttribute($value)
    {
        $this->attributes['cache_path_wap'] = (trim($value));
    }

    public function setIsrcAttribute($value)
    {
        $this->attributes['isrc'] = (trim($value));
    }

    public function setUpcAttribute($value)
    {
        $this->attributes['upc'] = (trim($value));
    }

    public function setSearchInfoAttribute($value)
    {
        $this->attributes['search_info'] = (trim($value));
    }

    public function setCdnLocatePathAttribute($value)
    {
        $this->attributes['cdn_locate_path'] = (trim($value));
    }

}
