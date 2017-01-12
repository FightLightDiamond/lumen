<?php

namespace App\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use App\Repositories\VideoRepository;
use App\Entities\Video;
use App\Validators\VideoValidator;

/**
 * class VideoRepositoryEloquent
 * @package namespace App\Repositories;
 */
class VideoRepositoryEloquent extends BaseRepository implements VideoRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return Video::class;
    }

    public function getHot()
    {

    }
    public function getNew()
    {

    }
    public function getHighLight()
    {

    }
    public function getByType($type)
    {

    }
    public function getDetails($identify)
    {

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
