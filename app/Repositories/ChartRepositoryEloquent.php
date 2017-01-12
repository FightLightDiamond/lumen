<?php

namespace App\Repositories;

use Carbon\Carbon;
use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use App\Repositories\ChartRepository;
use App\Entities\Chart;

/**
 * class ChartRepositoryEloquent
 * @package namespace App\Repositories;
 */
class ChartRepositoryEloquent extends BaseRepository implements ChartRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return Chart::class;
    }
    public function store(){
        $maxWeek = $this->makeModel()->max('week');
        $newWeek = ++$maxWeek;
        return $this->renderNoItem($newWeek);
    }
    private function renderNoItem($newWeek){
        $items = NULL;
        $now = Carbon::now();
        for ($type = 1; $type <= 3; $type++)
        {
            for($area = 1; $area <= 3; $area++)
            {
                for($rank = 1; $rank <= 10; $rank++)
                {
                    $items[] = [
                        'type' => $type,
                        'area' => $area,
                        'rank' => $rank,
                        'week' => $newWeek,
                        'created_at' => $now
                    ];
                }
            }
        }
        return $this->makeModel()->insert($items);
    }
    public function getListWeek() {
        return $this->makeModel()
            ->orderBy('week', 'desc')
            ->distinct()->pluck('week');
    }
    public function getDataByWeekAndType($week, $type) {
        return $this->makeModel()
            ->where('week', $week)
            ->where('type', $type)
            ->orderBy('area')
            ->orderBy('rank')
            ->with(['item' => function ($query) {
                $query->select('id', 'name');
            }])
            ->get();
    }
    public function getData($input = []){
        return $this->makeModel()
                ->filter($input)
                ->order($input)
                ->relation(['id', 'name'])
                ->get();
    }
    public function getDetail($type, $area)
    {

    }
    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
}
