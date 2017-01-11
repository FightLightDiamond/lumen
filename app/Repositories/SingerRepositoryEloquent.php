<?php

namespace App\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use App\Repositories\SingerRepository;
use App\Entities\Singer;
use App\Validators\SingerValidator;

/**
 * class SingerRepositoryEloquent
 * @package namespace App\Repositories;
 */
class SingerRepositoryEloquent extends BaseRepository implements SingerRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return Singer::class;
    }

    

    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
}
