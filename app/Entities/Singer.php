<?php

namespace App\Entities;

use App\MultiInheritance\ModelsTrait;
use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

class Singer extends Model implements Transformable
{
    use TransformableTrait;
    use ModelsTrait;

    protected $fillable = [
        'alias_name',
        'real_name',
        'latin_alias_name',
        'latin_real_name',
        'image',
        'gender',
        'information',
        'is_active',
        'identify',
        'created_by',
        'updated_by'
    ];

    //======================SCOPE=========================>

    public function scopeFilter($query, $input)
    {
        if (isset($input['alias_name']) && $input['alias_name'] != '') {
            $query
                ->where('alias_name', 'LIKE', '%' . trim($input['alias_name']) . '%')
                ->orWhere('latin_alias_name', 'LIKE', '%' . trim($input['alias_name']) . '%');
        }
        if (isset($input['real_name']) && $input['real_name'] != '') {
            $query
                ->where('real_name', 'LIKE', '%' . trim($input['real_name']) . '%')
                ->orWhere('latin_real_name', 'LIKE', '%' . trim($input['real_name']) . '%');
        }
        if (isset($input['gender']) && $input['gender'] != '') {
            $query->where('gender', $input['gender']);
        }
        if (isset($input['is_active']) && $input['is_active'] != '') {
            $query->where('is_active', $input['is_active']);
        }
        return $query;
    }

    //======================ACTION=========================

    protected $upload = [
        'image' => 1,
    ];
    protected $pathUpload = [
        'image' => '/singer',
    ];

    protected $thumbImage = [
        'image' => [
            '/images_thumb/singer/' => [
                [103, 103], [310, 310]
            ]
        ]
    ];

    protected $checkbox = ['is_active'];

    public function type()
    {
        return [
            1 => trans('label.vietnam'),
            2 => trans('label.asia'),
            3 => trans('label.usuk'),
        ];
    }

}
