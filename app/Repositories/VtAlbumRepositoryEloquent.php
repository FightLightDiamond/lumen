<?php

namespace App\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use App\Repositories\VtAlbumRepository;
use App\Entities\VtAlbum;
use App\Validators\VtAlbumValidator;

/**
 * Class VtAlbumRepositoryEloquent
 * @package namespace App\Repositories;
 */
class VtAlbumRepositoryEloquent extends BaseRepository implements VtAlbumRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return VtAlbum::class;
    }

    

    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
}
