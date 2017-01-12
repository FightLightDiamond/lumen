<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;
use App\MultiInheritance\ModelsTrait;

class Chart extends Model implements Transformable
{
    use TransformableTrait;
    use ModelsTrait;

    public $table = 'charts';
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';

    public $fillable = [
        'week',
        'item_id',
        'area',
        'type',
        'point',
        'rank',
        'is_active'
        ];

    public function item(){
        if($this->type  === 1)
        {
            return $this->belongsTo(Song::class, 'item_id');
        }
        else if ($this->type  === 2)
        {
            return $this->belongsTo(Video::class, 'item_id');
        }
        else
            {
            return $this->belongsTo(Album::class, 'item_id');
        }
    }

    public function scopeFilter($query, $input){
        if(isset($input['week']) && $input['week'] != "")
        {
            $query->where($this->table.'.week', trim($input['week']));
        }
        if(isset($input['area']) && $input['area'] != "")
        {
            $query->where($this->table.'.area', trim($input['area']));
        }
        if(isset($input['type']))
        {
            $query->where('type', $input['type']);
        }
        return $query;
    }

    public function scopeRelation($query , $selector = '*')
    {
        $query->with(
            [
                'item' => function ($query) use($selector)
                {
                    $query->select($selector);
                }
            ]
        );
        return $query;
    }

    public function scopeOrder($query, $input = NULL)
    {
        if($input === NULL)
        {
            $query->orderBy('week', 'ASC');
        }
        if(isset($input['order_by']))
        {
            $query->orderBy($this->table.'.'.$input['order_by'], $input['order']);
        }
        return $query;
    }

    public $checkbox = ['is_active'];

    public function setWeekIdAttribute($value)
    {
        $this->attributes['week'] = (trim($value));
    }
    public function setYearAttribute($value)
    {
        $this->attributes['year'] = (trim($value));
    }
    public function setItemIdAttribute($value)
    {
        $this->attributes['item_id'] = (trim($value));
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
    public function setIsActiveAttribute($value)
    {
        $this->attributes['is_active'] = (trim($value));
    }
}
