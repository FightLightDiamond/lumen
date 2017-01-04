<?php

namespace App\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use App\Repositories\VtVideoRepository;
use App\Entities\VtVideo;
use App\Validators\VtVideoValidator;

/**
 * Class VtVideoRepositoryEloquent
 * @package namespace App\Repositories;
 */
class VtVideoRepositoryEloquent extends BaseRepository implements VtVideoRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return VtVideo::class;
    }

    

    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
}
