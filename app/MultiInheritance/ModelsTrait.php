<?php

/**
 * Created by PhpStorm.
 * User: e
 * Date: 1/7/17
 * Time: 1:36 PM
 */
namespace App\MultiInheritance;

use App\Entities\User;
use Illuminate\Support\Facades\Input;

trait ModelsTrait
{
    public $uploads = ['image' => 1];
    public $checkbox = ['is_active'];
    protected $pathUpload = [
        'image' => '/image',
    ];

    //=====================RELATION============================>

    public function user_created()
    {
        return $this->belongsTo(User::class, 'created_by');
    }

    public function user_updated()
    {
        return $this->belongsTo(User::class, 'updated_by');
    }

    public function created_by()
    {
        if (isset($this->user_create))
            return $this->user_create->email;
        return '--';
    }

    public function updated_by()
    {
        if (isset($this->user_update))
            return $this->user_update->email;
        return '--';
    }

    //======================SCOPE===============================>

    public function scopeOrders($query, $input = [])
    {
        foreach ($input as $field => $value) {
            $query->orderBy($this->table . '.' . $field, $value);
        }
        return $query;
    }

    //========================ACTION============================>

    public function checkbox($input)
    {
        foreach ($this->checkbox as $value) {
            (isset($input[$value]) && $input[$value] != '0') ? $input[$value] = 1 : $input[$value] = 0;
        }
        return $input;
    }

    public function uploads($input)
    {
        $folder = '';
        foreach ($this->upload as $name => $key) {
            if (Input::file($name)) {
                $this->removeFileExits($name);
                $input = $this->processUploads($input, $folder, $name, $key);
            } else {
                unset($input[$name]);
            }
        }
        return $input;
    }

    public function processUploads($input, $folder, $name, $key)
    {
        if (isset($this->pathUpload)) {
            $folder = $this->pathUpload[$name];
        }
        $link = $this->generatePath($folder, $key);
        if ($key === 0) {
            $input[$name] = app('upload')->file($input[$name], $link);
        } else {
            $input[$name] = app('upload')->images(
                $input[$name],
                $link,
                isset($this->thumbImage[$name]) ? $this->thumbImage[$name] : []
            );
        }
        return $input;
    }

    private function generatePath($folder, $key)
    {
        $basePath = storage_path('uploads');

        if (!file_exists($basePath)) {
            mkdir($basePath, 0777, true);
        }
//        if($key == 1) {
//            $folder .= '/image';
//        } else {
//            $folder .= '/files';
//        }
        $basePath = $basePath . $folder;
        if (!file_exists($basePath)) {
            mkdir($basePath, 0777, true);
        }
        $basePath = $basePath . '/' . date('Y');
        if (!file_exists($basePath)) {
            mkdir($basePath, 0777, true);
        }
        $basePath = $basePath . '/' . date('m');
        if (!file_exists($basePath)) {
            mkdir($basePath, 0777, true);
        }
        $basePath = $basePath . '/' . date('d');
        if (!file_exists($basePath)) {
            mkdir($basePath, 0777, true);
        }
        return $basePath;
    }

    private function removeFileExits($name)
    {
        if (isset($this->$name) && $this->$name != '') {
            try {
                unlink($this->$name);
            } catch (\Exception $e) {

            }
        }
    }

    private function removeFile()
    {
        foreach ($this->upload as $value) {
            try {
                if (($this->upload != '') && ($this->upload != NUll)) {
                    unlink($this->$value);
                }
            } catch (\Exception $e) {

            }
        }
    }

}