<?php
/**
 * Created by PhpStorm.
 * User: e
 * Date: 1/4/17
 * Time: 1:33 PM
 */

namespace App\Http\Controllers;


use App\Repositories\VtChartRepository;
use Illuminate\Http\Request;

class ChartController
{
    protected $repository;
    public function __construct(VtChartRepository $repository)
    {
        $this->repository = $repository;
    }
    public function getListWeek($type = 1, $area = 1)
    {
        $data = $this->repository->getListWeek($type, $area);
        return response()->json($data);
    }
    public function getItemByWeekAndType($week, $type)
    {
        $data = $this->repository->getDataByWeekAndType($week, $type);
        return response()->json($data);
    }
    public function getData(Request $request)
    {
        $input = $request->all();
        $data = $this->repository->getData($input);
        return response()->json($data);
    }
    public function create(){
        $data = $this->repository->store();
        return response()->json($data);
    }
    public function update($id, Request $request){
        $data = $this->repository->update($request->all(), $id);
        return response()->json($data);
    }
    public function active(Request $request){
        $input = $request->all();
        $data = $this->repository->makeModel()
            ->whereIn('week', $input['week'])
            ->whereIn('type', $input['type'])
            ->update(['is_active', $input['is_active']]);
        return response()->json($data);
    }
    public function getActually(){
        $input['orders'] = [
            'week' =>'desc',
            'type' => 'asc',
            'area' => 'asc',
            'rank' => 'asc',
        ];
        $input['limit'] = 90;
        //$const = config('constQuery.charts.getCurrentChart');
        $data = $this->repository->makeModel()
            //->where('is_active', 1)
            ->orders($input['orders'] )
            ->relation(['id', 'name'])
            ->limit(90)
            ->get();
        return response()->json($data);
    }
    public function setActive(Request $request){
        $input = $request->all();
        $data = $this->repository->makeModel()
            ->where('week', $input['week'])
            ->update(['is_active' => $input['is_active']]);
        return response()->json($data);
    }
}