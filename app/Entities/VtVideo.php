<?php

namespace App\Entities;

use App\Components\Constants\ConstComm;
use App\Components\Constants\ConstDB;
use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

class VtVideo extends Model
{
    public $table = 'vt_videos';
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';

    public $fillable = [
        'name',
        'description',
        'is_active',
        'is_hot',
        'listen_no',
        'listen_no_fake',
        'path',
        'path_4g',
        'image_path',
        'user_creator_id',
        'like_no',
        'download_no',
        'published_time',
        'bit_rate',
        'name_unsign',
        'identify',
        'created_by',
        'updated_by',
        'slug',
        'singer_info',
        'wap_path',
        'locate_path',
        'price',
        'seo_title',
        'seo_description',
        'seo_keywords',
        'slug_new',
        'is_impression',
        'cache_path',
        'cache_path_wap',
        'listen_no_day',
        'listen_no_week',
        'status',
        'reason',
        'vote_point',
        'vote_count',
        'search_info',
        'uploader',
        'search_info_unsign',
        'lyric',
        'mp3_path',
        'beat_path',
        'lyric_path',
        'video_type',
        'cdn_locate_path',
        'type',
        'cache_path_adaptive',
        'cache_wap_path_adaptive',
        'total_like',
        'total_status',
        'total_shared',
        'transaction_id',
        'country_code'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'name' => 'string',
        'description' => 'string',
        'is_active' => 'boolean',
        'is_hot' => 'boolean',
        'path' => 'string',
        'path_4g' => 'string',
        'image_path' => 'string',
        'published_time' => 'datetime',
        'bit_rate' => 'boolean',
        'name_unsign' => 'string',
        'identify' => 'string',
        'slug' => 'string',
        'singer_info' => 'string',
        'wap_path' => 'string',
        'locate_path' => 'string',
        'seo_title' => 'string',
        'seo_description' => 'string',
        'seo_keywords' => 'string',
        'slug_new' => 'string',
        'is_impression' => 'boolean',
        'cache_path' => 'string',
        'cache_path_wap' => 'string',
        'status' => 'boolean',
        'reason' => 'string',
        'vote_count' => 'integer',
        'search_info' => 'string',
        'uploader' => 'string',
        'search_info_unsign' => 'string',
        'lyric' => 'string',
        'mp3_path' => 'string',
        'beat_path' => 'string',
        'lyric_path' => 'string',
        'cdn_locate_path' => 'string',
        'type' => 'integer',
        'cache_path_adaptive' => 'string',
        'cache_wap_path_adaptive' => 'string',
        'transaction_id' => 'integer',
        'country_code' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [

    ];

    public function scopeFilter($query, $input)
    {
        if (isset($input['name']) && ($input['name'] != '')) {
            $name = trim($input['name']);
            $query->where(function ($query) use ($name) {
                $query->where($this->table . '.name', 'LIKE', '%' . $name . '%')
                    ->orWhere($this->table . '.name_unsign', 'LIKE', '%' . $name . '%');
            });
        }
        if (isset($input['singer']) && $input['singer'] != '') {
            $singer = trim($input['singer']);
            $query->where(function ($query) use ($singer) {
                $query->where($this->table . '.search_info', 'LIKE', '%' . $singer . '%')
                    ->orWhere($this->table . '.search_info_unsign', 'LIKE', '%' . $singer . '%');
            });
        }
        if (isset($input['is_hot']) && $input['is_hot'] != '') {
            $query->where('is_hot', $input['is_hot']);
        }
        if (isset($input['is_active']) && $input['is_active'] != '') {
            $query->where('is_active', $input['is_active']);
        }

        // Check role user if is role is CP_VIDEO, only show video created by this user
        if (!\Auth::getUser()->can(ConstComm::PERMISSIONS['ADMIN_VIDEO']) &&
            \Auth::getUser()->can(ConstComm::PERMISSIONS['CP_VIDEO'])) {
            $query->where('created_by', \Auth::getUser()->id);
        }
        return $query;
    }

    /**
     * Relationship tag, singer, author, ring back tone, topic, category, icon
     */
    public function scopeOrder($query, $input){
        if(isset($input['order_by'])) $query->orderBy($this->table.'.'.$input['order_by'], $input['order']);
        if(!isset($input['order_by'])) $query->orderBy($this->table.'.updated_at', 'DESC');
        return $query;
    }
    public function tag(){
        return $this->belongsToMany(VtDmTag::class, 'vt_video_dm_tag', 'id', 'dm_tag_id');
    }
    public function singer(){
        return $this->belongsToMany(VtSinger::class, 'vt_video_singer', 'video_id', 'singer_id');
    }
    public function author(){
        return $this->belongsToMany(VtAuthor::class, 'vt_video_author', 'video_id', 'author_id');
    }
    public function RingBackTone(){
        return $this->belongsToMany(VtRingBackTone::class, 'vt_video_ringbacktone', 'video_id', 'RingBacktone_id');
    }
    public function topic(){
        return $this->belongsToMany(VtTopic::class, 'vt_video_topic', 'video_id', 'topic_id');
    }
    public function category(){
        return $this->belongsToMany(VtCategories::class, 'vt_video_category', 'video_id', 'category_id');
    }
    public function icon(){
        return $this->belongsToMany(VtIcon::class, 'vt_video_icon', 'video_id', 'icon_id');
    }

    /**Auto upload and checkbox
     * @var array
     */
    protected  $upload = ['image_path' => 1 , 'path' => 0, 'path_4g' => 0, 'wap_path' => 0];
    protected  $pathUpload = ['image_path'=> 'video/images', 'path'=>'video', 'path_4g'=>'video', 'wap_path'=>'video'];

    protected $thumbPath = ['images/images_thumb/f_sata11/video/images', 'images/images_thumb/f_sata11/video/images', 'images/images_thumb/f_sata11/video/images'];
    protected $thumbSize = [[200, 113], [147, 83], [390, 220]];

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

    protected  $checkbox = ['is_active', 'is_hot', 'is_impression'];

    /**Accessor and Mutator
     * @param $value
     */

    public function setNameAttribute($value)
    {
        $this->attributes['name'] = (trim($value));
    }
    public function setDescriptionAttribute($value)
    {
        $this->attributes['description'] = (trim($value));
    }
    public function setIsActiveAttribute($value)
    {
        $this->attributes['is_active'] = (trim($value));
    }
    public function setIsHotAttribute($value)
    {
        $this->attributes['is_hot'] = (trim($value));
    }
    public function setListenNoAttribute($value)
    {
        $this->attributes['listen_no'] = (trim($value));
    }
    public function setPathAttribute($value)
    {
        $this->attributes['path'] = (trim($value));
    }
    public function setImagePathAttribute($value)
    {
        $this->attributes['image_path'] = (trim($value));
    }
    public function setUserCreatorIdAttribute($value)
    {
        $this->attributes['user_creator_id'] = (trim($value));
    }
    public function setLikeNoAttribute($value)
    {
        $this->attributes['like_no'] = (trim($value));
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
    public function setIdentifyAttribute($value)
    {
        $this->attributes['identify'] = (trim($value));
    }
    public function setSlugAttribute($value)
    {
        $this->attributes['slug'] = (trim($value));
    }
    public function setSingerInfoAttribute($value)
    {
        $this->attributes['singer_info'] = (trim($value));
    }
    public function setWapPathAttribute($value)
    {
        $this->attributes['wap_path'] = (trim($value));
    }
    public function setLocatePathAttribute($value)
    {
        $this->attributes['locate_path'] = (trim($value));
    }
    public function setPriceAttribute($value)
    {
        $this->attributes['price'] = (trim($value));
    }
    public function setSeoTitleAttribute($value)
    {
        $this->attributes['seo_title'] = (trim($value));
    }
    public function setSeoDescriptionAttribute($value)
    {
        $this->attributes['seo_description'] = (trim($value));
    }
    public function setSeoKeywordsAttribute($value)
    {
        $this->attributes['seo_keywords'] = (trim($value));
    }
    public function setSlugNewAttribute($value)
    {
        $this->attributes['slug_new'] = (trim($value));
    }
    public function setIsImpressionAttribute($value)
    {
        $this->attributes['is_impression'] = (trim($value));
    }
    public function setCachePathAttribute($value)
    {
        $this->attributes['cache_path'] = (trim($value));
    }
    public function setCachePathWapAttribute($value)
    {
        $this->attributes['cache_path_wap'] = (trim($value));
    }
    public function setListenNoDayAttribute($value)
    {
        $this->attributes['listen_no_day'] = (trim($value));
    }
    public function setListenNoWeekAttribute($value)
    {
        $this->attributes['listen_no_week'] = (trim($value));
    }
    public function setStatusAttribute($value)
    {
        $this->attributes['status'] = (trim($value));
    }
    public function setReasonAttribute($value)
    {
        $this->attributes['reason'] = (trim($value));
    }
    public function setVotePointAttribute($value)
    {
        $this->attributes['vote_point'] = (trim($value));
    }
    public function setVoteCountAttribute($value)
    {
        $this->attributes['vote_count'] = (trim($value));
    }
    public function setSearchInfoAttribute($value)
    {
        $this->attributes['search_info'] = (trim($value));
    }
    public function setUploaderAttribute($value)
    {
        $this->attributes['uploader'] = (trim($value));
    }
    public function setSearchInfoUnsignAttribute($value)
    {
        $this->attributes['search_info_unsign'] = (trim($value));
    }
    public function setLyricAttribute($value)
    {
        $this->attributes['lyric'] = (trim($value));
    }
    public function setMp3PathAttribute($value)
    {
        $this->attributes['mp3_path'] = (trim($value));
    }
    public function setBeatPathAttribute($value)
    {
        $this->attributes['beat_path'] = (trim($value));
    }
    public function setLyricPathAttribute($value)
    {
        $this->attributes['lyric_path'] = (trim($value));
    }
    public function setVideoTypeAttribute($value)
    {
        $this->attributes['video_type'] = (trim($value));
    }
    public function setCdnLocatePathAttribute($value)
    {
        $this->attributes['cdn_locate_path'] = (trim($value));
    }
    public function setTypeAttribute($value)
    {
        $this->attributes['type'] = (trim($value));
    }
    public function setCachePathAdaptiveAttribute($value)
    {
        $this->attributes['cache_path_adaptive'] = (trim($value));
    }
    public function setCacheWapPathAdaptiveAttribute($value)
    {
        $this->attributes['cache_wap_path_adaptive'] = (trim($value));
    }
    public function setTotalLikeAttribute($value)
    {
        $this->attributes['total_like'] = (trim($value));
    }
    public function setTotalStatusAttribute($value)
    {
        $this->attributes['total_status'] = (trim($value));
    }
    public function setTotalSharedAttribute($value)
    {
        $this->attributes['total_shared'] = (trim($value));
    }
    public function setTransactionIdAttribute($value)
    {
        $this->attributes['transaction_id'] = (trim($value));
    }
    public function setCountryCodeAttribute($value)
    {
        $this->attributes['country_code'] = (trim($value));
    }

    public function getPublishedTimeAttribute($value)
    {
        return ($value === ConstDB::DEFAULT_DATETIME) ? '' : $value;
    }
}
