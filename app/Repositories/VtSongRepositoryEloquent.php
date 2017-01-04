<?php

namespace App\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use App\Repositories\VtSongRepository;
use App\Entities\VtSong;
use App\Validators\VtSongValidator;

/**
 * Class VtSongRepositoryEloquent
 * @package namespace App\Repositories;
 */
class VtSongRepositoryEloquent extends BaseRepository implements VtSongRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return VtSong::class;
    }

    

    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
}
