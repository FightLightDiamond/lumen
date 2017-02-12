<?php

namespace App\Repositories;

use Prettus\Repository\Contracts\RepositoryInterface;

/**
 * interface ChartRepository
 * @package namespace App\Repositories;
 */
interface ChartRepository extends RepositoryInterface
{
    public function store();
    public function getListWeek();
    public function getDataByWeekAndType($week, $type);
    public function getData($input);

    public function getDetail($type, $area);
}
