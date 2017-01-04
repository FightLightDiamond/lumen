<?php

namespace App\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use App\Repositories\VtDmTagRepository;
use App\Entities\VtDmTag;
use App\Validators\VtDmTagValidator;

/**
 * Class VtDmTagRepositoryEloquent
 * @package namespace App\Repositories;
 */
class VtDmTagRepositoryEloquent extends BaseRepository implements VtDmTagRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return VtDmTag::class;
    }

    

    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
}
