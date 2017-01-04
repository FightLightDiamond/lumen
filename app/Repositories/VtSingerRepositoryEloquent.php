<?php

namespace App\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use App\Repositories\VtSingerRepository;
use App\Entities\VtSinger;
use App\Validators\VtSingerValidator;

/**
 * Class VtSingerRepositoryEloquent
 * @package namespace App\Repositories;
 */
class VtSingerRepositoryEloquent extends BaseRepository implements VtSingerRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return VtSinger::class;
    }

    

    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
}
