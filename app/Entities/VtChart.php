<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

class VtChart extends Model implements Transformable
{
    use TransformableTrait;

    public $table = 'vt_bxh';
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';

    public $fillable = [
        'week',
        'item_id',
        'area',
        'type',
        'point',
        'rank',
        'is_active',
        'country_code'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'week_id' => 'integer',
        'year' => 'integer',
        'type' => 'string',
        'rank' => 'integer',
        'kichhoat' => 'boolean',
        'country_code' => 'string'
    ];

    public function item(){
        if($this->type  === 1) {
            return $this->belongsTo(VtSong::class, 'item_id');
        }
        else if ($this->type  === 2) {
            return $this->belongsTo(VtVideo::class, 'item_id');
        }
        else {
            return $this->belongsTo(VtAlbum::class, 'item_id');
        }
    }

    public function video(){
        return $this->belongsTo(VtVideo::class, 'video_id');
    }

    public function song(){
        return $this->belongsTo(VtSong::class);
    }

    public function scopeFilter($query , $input){
        if(isset($input['week_id']) && $input['week_id']!=""){
            $query->where($this->table.'.week_id', trim($input['week_id']));
        }
        if(isset($input['year']) && $input['year']!=""){
            $query->where($this->table.'.year', trim($input['year']));
        }
        if(isset($input['type'])) $query->where('type', $input['type']);
        return $query;
    }

    public function scopeRelation($query, $song)
    {
        if (isset($song)) {
            if ($song == 1)
                $query->where('song_id', '!=', '')->where('song_id', '!=', null)->with('song');
            else $query->where('video_id', '!=', '')->where('video_id', '!=', null)->with('video');
        }
        return $query;
    }

    public function scopeOrder($query, $input){
        if(isset($input['order_by'])) $query->orderBy($this->table.'.'.$input['order_by'], $input['order']);
        $query->orderBy($this->table.'.year', 'DESC');
        $query->orderBy($this->table.'.week_id', 'DESC');
        $query->orderBy($this->table.'.rank', 'DESC');
        return $query;
    }

    public $checkbox = ['kichhoat'];

    public function setWeekIdAttribute($value)
    {
        $this->attributes['week_id'] = (trim($value));
    }
    public function setYearAttribute($value)
    {
        $this->attributes['year'] = (trim($value));
    }
    public function setSongIdAttribute($value)
    {
        $this->attributes['song_id'] = (trim($value));
    }
    public function setVideoIdAttribute($value)
    {
        $this->attributes['video_id'] = (trim($value));
    }
    public function setTypeAttribute($value)
    {
        $this->attributes['type'] = (trim($value));
    }
    public function setPointAttribute($value)
    {
        $this->attributes['point'] = (trim($value));
    }
    public function setRankAttribute($value)
    {
        $this->attributes['rank'] = (trim($value));
    }
    public function setKichhoatAttribute($value)
    {
        $this->attributes['kichhoat'] = (trim($value));
    }
    public function setCountryCodeAttribute($value)
    {
        $this->attributes['country_code'] = (trim($value));
    }

}
