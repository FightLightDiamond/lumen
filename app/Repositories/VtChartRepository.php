<?php

namespace App\Repositories;

use Prettus\Repository\Contracts\RepositoryInterface;

/**
 * Interface VtChartRepository
 * @package namespace App\Repositories;
 */
interface VtChartRepository extends RepositoryInterface
{
    public function store();
    public function getListWeek($type, $area);
    public function getItemsAndType($week, $type);
    public function getData($input);
}
