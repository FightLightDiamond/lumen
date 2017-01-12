<?php
/**
 * Created by PhpStorm.
 * User: cuongpm00
 * Date: 8/23/2016
 * Time: 4:08 PM
 */

namespace App\Services;


use App\Components\Constants\ConstView;
use App\Models\Album;
use App\Models\Song;
use App\Models\Video;

class InputService
{
    public function identify($repository){
        $countIdentify = true;
        $identify = null;
        while($countIdentify){
            $identify = str_random(8);
            if($repository->findWhere(['identify'=> $identify])->count()==0) $countIdentify = false;
        }
        return $identify;
    }
    public function getIdentify($link){
        $arrayString = explode("/", $link);
        $string = end($arrayString);
        return str_replace('.html', '', $string);
    }
    public function typeItem($id, $type){
        if($type == 1) {
            $data = VtSong::find($id);
        }
        elseif($type == 2){
            $data = VtAlbum::find($id);

        }elseif($type == 3){
            $data = VtVideo::find($id);
        }
        if(isset($data)) return $data->name.' ('.$id.')';
        return $id;
    }

    public function type($type){
        if($type == 1) {
            return trans('label.song');
        }
        elseif($type == 2){
            return trans('label.song');

        }elseif($type == 3){
            return  trans('label.video');
        }
    }

    public function getType($data){
        $type = NULL;
        if($data->table == 'song') {
            return 'audio';
        }
        elseif($data->table == 'video') {
            return 'video';
        }
        elseif($data->table == 'album') {
            return 'album';
        }
    }
    public function getLink($data){
        return $this->getType($data).'/'.$data->slug.'/'.$data->identify.'.html';
    }
    public function getLinkWeb($data){
        return ConstView::LINK_WEB.$this->getLink($data);
    }
    public function getLinkWap($data){
        return ConstView::LINK_WAP.$this->getLink($data);
    }
    public function setSort($field){
        $result = 'fa-sort';
        if (request()->get('order_by')==$field) {
            return $result = (request()->get('order') === 'ASC') ? 'fa-sort-asc' : 'fa-sort-desc';
        }
        return $result;
    }
}