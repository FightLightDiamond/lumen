<?php

namespace App\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use App\Repositories\BannerDetailRepository;
use App\Entities\BannerDetail;
use App\Validators\BannerDetailValidator;

/**
 * Class BannerDetailRepositoryEloquent
 * @package namespace App\Repositories;
 */
class BannerDetailRepositoryEloquent extends BaseRepository implements BannerDetailRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return BannerDetail::class;
    }

    

    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
}
