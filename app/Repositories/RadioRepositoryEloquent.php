<?php

namespace App\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use App\Repositories\RadioRepository;
use App\Entities\Radio;
use App\Validators\RadioValidator;

/**
 * Class RadioRepositoryEloquent
 * @package namespace App\Repositories;
 */
class RadioRepositoryEloquent extends BaseRepository implements RadioRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return Radio::class;
    }

    

    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
}
