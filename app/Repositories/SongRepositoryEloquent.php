<?php

namespace App\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use App\Repositories\SongRepository;
use App\Entities\Song;
use App\Validators\SongValidator;

/**
 * class SongRepositoryEloquent
 * @package namespace App\Repositories;
 */
class SongRepositoryEloquent extends BaseRepository implements SongRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return Song::class;
    }

    public function getHot()
    {

    }
    public function getNew()
    {

    }
    public function getHighLight(){

    }
    public function getByType($type)
    {

    }
    public function getDetails($identify){

    }
    public function getBySinger($singer_id)
    {

    }

    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
}
