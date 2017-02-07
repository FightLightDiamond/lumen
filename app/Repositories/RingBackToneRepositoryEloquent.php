<?php

namespace App\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use App\Repositories\RingBackToneRepository;
use App\Entities\RingBackTone;
use App\Validators\RingBackToneValidator;

/**
 * class RingBackToneRepositoryEloquent
 * @package namespace App\Repositories;
 */
class RingBackToneRepositoryEloquent extends BaseRepository implements RingBackToneRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return RingBackTone::class;
    }

    

    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
}
