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
    public function getItemsAndType($week, $type)
    {
        $data = $this->repository->getItemsAndType($week, $type);
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
}