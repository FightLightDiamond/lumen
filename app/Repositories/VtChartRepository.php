<?php

namespace App\Repositories;

use Prettus\Repository\Contracts\RepositoryInterface;

/**
 * Interface VtChartRepository
 * @package namespace App\Repositories;
 */
interface VtChartRepository extends RepositoryInterface
{
    public function getListWeek($type, $area);
    public function getSongByWeekAndType($week_id, $type);
    public function getVideoByWeekAndType($week_id, $type);
}
