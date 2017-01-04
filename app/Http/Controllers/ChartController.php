<?php
/**
 * Created by PhpStorm.
 * User: e
 * Date: 1/4/17
 * Time: 1:33 PM
 */

namespace App\Http\Controllers;


use App\Repositories\VtChartRepository;

class ChartController
{
    protected $repository;
    public function __construct(VtChartRepository $repository)
    {
        $this->repository = $repository;
    }
    public function getListWeek(){
        return $this->repository->getListWeek();
    }
    public function getSongByWeekAndType($week_id, $type){
        return $this->repository->getSongByWeekAndType($week_id, $type);
    }
    public function getVideoByWeekAndType($week_id, $type){
        return $this->repository->getVideoByWeekAndType($week_id, $type);
    }
}