<?php

namespace App\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use App\Repositories\SingerRepository;
use App\Entities\Singer;
use App\Validators\SingerValidator;

/**
 * class SingerRepositoryEloquent
 * @package namespace App\Repositories;
 */
class SingerRepositoryEloquent extends BaseRepository implements SingerRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return Singer::class;
    }

    public function getData()
    {

    }
    public function getSingerOfWeek()
    {

    }
    public function getDetail($slug)
    {

    }
    public function store($input)
    {
        $input = $this->standardized($input, $this->makeModel());
        return $this->create($input);
    }
    public function change($input, $model)
    {
        $input = $this->standardized($input, $model);
        return $this->update($input, $model->id);
    }
    private function standardized($input, $model)
    {
        $input['identify'] = app('input')->identify($model);
        $input = $model->uploads($input);
        $input = $model->checkbox($input);
        return $input;
    }

    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
}
