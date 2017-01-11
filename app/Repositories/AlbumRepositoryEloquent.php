<?php

namespace App\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use App\Repositories\AlbumRepository;
use App\Entities\Album;
use App\Validators\AlbumValidator;

/**
 * class AlbumRepositoryEloquent
 * @package namespace App\Repositories;
 */
class AlbumRepositoryEloquent extends BaseRepository implements AlbumRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return Album::class;
    }

    

    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
}
