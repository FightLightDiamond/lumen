<?php

namespace App\Repositories;

use App\MultiInheritance\RepositoriesTrait;
use Illuminate\Support\Facades\Auth;
use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use App\Entities\Song;

/**
 * class SongRepositoryEloquent
 * @package namespace App\Repositories;
 */
class SongRepositoryEloquent extends BaseRepository implements SongRepository
{
    use RepositoriesTrait;
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return Song::class;
    }

    public function getHot()
    {

    }

    public function getNew()
    {

    }

    public function getHighLight()
    {

    }

    public function getByType($type)
    {

    }

    public function getByIdentify($identify)
    {

    }

    //-----------------------------CURL----------------------------------
    public function paginateAdvance($input)
    {
        if (!isset($input['numberRows'])) $input['numberRows'] = 10;
        return $this->makeModel()
            ->filter($input)
            ->order($input)
//            ->with('user_created')
//            ->with('user_updated')
            ->simplePaginate($input['numberRows']);
    }

    public function store($input)
    {
        $model = $this->makeModel();
        $input['identify'] = app('input')->identify($model);
        //$input['created_by'] = Auth::user()->id;
        $input = $this->standardized($input, $model);
        return $this->create($input);
    }

    public function change($input, $model)
    {
        //$input['updated_by'] = Auth::user()->id;
        $input = $this->standardized($input, $model);
        return $this->update($input, $model);
    }

    public function destroy($id, $skip = 0)
    {
        $result = $this->delete($id);
        if ($result) {
            if ($skip !== 0) {
                $data = $this->makeModel()->skip($skip)->take(1)->get();
                return $data;
            }
            return $result;
        }
        return false;
    }

    public function isActive($input)
    {

    }

    public function isDownload($input)
    {

    }

    //------------------------------Help------------------------------------
    private function standardized($input, $model)
    {
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
