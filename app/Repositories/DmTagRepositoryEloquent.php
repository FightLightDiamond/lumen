<?php

namespace App\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use App\Repositories\DmTagRepository;
use App\Entities\DmTag;
use App\Validators\DmTagValidator;

/**
 * class DmTagRepositoryEloquent
 * @package namespace App\Repositories;
 */
class DmTagRepositoryEloquent extends BaseRepository implements DmTagRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return DmTag::class;
    }

    

    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
}
