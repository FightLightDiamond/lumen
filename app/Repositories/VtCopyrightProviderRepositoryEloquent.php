<?php

namespace App\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use App\Repositories\VtCopyrightProviderRepository;
use App\Entities\VtCopyrightProvider;
use App\Validators\VtCopyrightProviderValidator;

/**
 * Class VtCopyrightProviderRepositoryEloquent
 * @package namespace App\Repositories;
 */
class VtCopyrightProviderRepositoryEloquent extends BaseRepository implements VtCopyrightProviderRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return VtCopyrightProvider::class;
    }

    

    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
}
