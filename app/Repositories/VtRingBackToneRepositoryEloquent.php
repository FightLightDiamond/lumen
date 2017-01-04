<?php

namespace App\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use App\Repositories\VtRingBackToneRepository;
use App\Entities\VtRingBackTone;
use App\Validators\VtRingBackToneValidator;

/**
 * Class VtRingBackToneRepositoryEloquent
 * @package namespace App\Repositories;
 */
class VtRingBackToneRepositoryEloquent extends BaseRepository implements VtRingBackToneRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return VtRingBackTone::class;
    }

    

    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
}
