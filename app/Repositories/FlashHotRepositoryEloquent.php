<?php

namespace App\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use App\Repositories\FlashHotRepository;
use App\Entities\FlashHot;
use App\Validators\FlashHotValidator;

/**
 * Class FlashHotRepositoryEloquent
 * @package namespace App\Repositories;
 */
class FlashHotRepositoryEloquent extends BaseRepository implements FlashHotRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return FlashHot::class;
    }

    public function getData()
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
