<?php

namespace App\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use App\Repositories\OfferSetupDetailRepository;
use App\Entities\OfferSetupDetail;
use App\Validators\OfferSetupDetailValidator;

/**
 * Class OfferSetupDetailRepositoryEloquent
 * @package namespace App\Repositories;
 */
class OfferSetupDetailRepositoryEloquent extends BaseRepository implements OfferSetupDetailRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return OfferSetupDetail::class;
    }

    

    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
}
