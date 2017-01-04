<?php

namespace App\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use App\Repositories\VtTopicRepository;
use App\Entities\VtTopic;
use App\Validators\VtTopicValidator;

/**
 * Class VtTopicRepositoryEloquent
 * @package namespace App\Repositories;
 */
class VtTopicRepositoryEloquent extends BaseRepository implements VtTopicRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return VtTopic::class;
    }

    

    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
}
