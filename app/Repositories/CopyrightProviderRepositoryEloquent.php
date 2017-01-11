<?php

namespace App\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use App\Repositories\CopyrightProviderRepository;
use App\Entities\CopyrightProvider;
use App\Validators\CopyrightProviderValidator;

/**
 * class CopyrightProviderRepositoryEloquent
 * @package namespace App\Repositories;
 */
class CopyrightProviderRepositoryEloquent extends BaseRepository implements CopyrightProviderRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return CopyrightProvider::class;
    }

    

    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
}
