<?php

namespace App\Entities;

use App\MultiInheritance\ModelsTrait;
use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

class CopyrightProvider extends Model implements Transformable
{
    use TransformableTrait;
    use ModelsTrait;

    public $fillable = [
        'code',
        'name',
        'latin_name',
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
                $query
                    ->where($this->table . '.name', 'LIKE', '%' . $name . '%')
                    ->where($this->table . '.latin_name', 'LIKE', '%' . $name . '%');
            });
        }
        if (isset($input['code']) && $input['code'] != '')
        {
            $code = trim($input['code']);
            $query->where(function ($query) use ($code)
            {
                $query->where($this->table . '.code', 'LIKE', '%' . $code . '%');
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
