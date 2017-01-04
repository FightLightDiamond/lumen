<?php

namespace App\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use App\Repositories\VtChartRepository;
use App\Entities\VtChart;
use App\Validators\VtChartValidator;

/**
 * Class VtChartRepositoryEloquent
 * @package namespace App\Repositories;
 */
class VtChartRepositoryEloquent extends BaseRepository implements VtChartRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return VtChart::class;
    }

    public function getListWeek() {
        return $this->makeModel()
            ->orderBy('week_id', 'desc')
            ->distinct()->pluck('week_id');
    }

    public function getSongByWeekAndType($week_id, $type) {
        $isMedia = ['song_id', 'song'];
        return $this->getItems($week_id, $type, $isMedia);
    }

    public function getVideoByWeekAndType($week_id, $type) {
        $isMedia = ['video_id', 'video'];
        return $this->getItems($week_id, $type, $isMedia);
    }

    private function getItems($week_id, $type, $isMedia){
        return $this->makeModel()
            ->where('week_id', $week_id)
            ->where('type', $type)
            ->where($isMedia[0], '!=', NULL)
            ->where($isMedia[0], '!=', '')
            ->orderBy('rank', 'DESC')
            ->with([$isMedia[1] => function ($query) {
                $query->select('id', 'name');
            }])
            ->get();
    }

    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
}
