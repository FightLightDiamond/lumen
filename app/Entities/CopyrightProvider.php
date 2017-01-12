<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

class CopyrightProvider extends Model implements Transformable
{
    use TransformableTrait;

    public $fillable = [
        'name',
        'full_name',
        'is_active',
        'profit_percent',
        'is_singer',
        'country_code'
    ];

//    public function copyright_provider_change(){
//        return $this->hasMany(CopyrightProviderChange::class, 'copyright_id');
//    }

    protected $checkbox = ['is_active', 'is_singer'];

    public function scopeFilter($query, $input)
    {
        if (isset($input['name']) && ($input['name'] != ''))
        {
            $name = trim($input['name']);
            $query->where(function ($query) use ($name)
            {
                $query->where($this->table . '.name', 'LIKE', '%' . $name . '%');
            });
        }
        if (isset($input['full_name']) && $input['full_name'] != '')
        {
            $singer = trim($input['full_name']);
            $query->where(function ($query) use ($singer)
            {
                $query->where($this->table . '.full_name', 'LIKE', '%' . $singer . '%');
            });
        }
        if (isset($input['is_singer']) && $input['is_singer'] != '')
        {
            $query->where('is_singer', $input['is_singer']);
        }
        if (isset($input['is_active']) && $input['is_active'] != '')
        {
            $query->where('is_active', $input['is_active']);
        }
        return $query;
    }
}
