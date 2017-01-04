<?php

namespace App\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use App\Repositories\VtAuthorRepository;
use App\Entities\VtAuthor;
use App\Validators\VtAuthorValidator;

/**
 * Class VtAuthorRepositoryEloquent
 * @package namespace App\Repositories;
 */
class VtAuthorRepositoryEloquent extends BaseRepository implements VtAuthorRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return VtAuthor::class;
    }

    

    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
}
