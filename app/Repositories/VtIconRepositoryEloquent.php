<?php

namespace App\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use App\Repositories\VtIconRepository;
use App\Entities\VtIcon;
use App\Validators\VtIconValidator;

/**
 * Class VtIconRepositoryEloquent
 * @package namespace App\Repositories;
 */
class VtIconRepositoryEloquent extends BaseRepository implements VtIconRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return VtIcon::class;
    }

    

    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
}
