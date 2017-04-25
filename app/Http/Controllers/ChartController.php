<?php
/**
 * Created by PhpStorm.
 * User: e
 * Date: 1/4/17
 * Time: 1:33 PM
 */

namespace App\Http\Controllers;

use App\Helper\Constant;
use App\Repositories\ChartRepository;
use Illuminate\Http\Request;

class ChartController
{
    protected $repository;

    public function __construct(ChartRepository $repository)
    {
        $this->repository = $repository;
    }

    public function getListWeek()
    {
        $data = $this->repository->getListWeek();
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

    public function create()
    {
        $data = $this->repository->store();
        return response()->json($data);
    }

    public function update($id, Request $request)
    {
        $data = $this->repository->update($request->all(), $id);
        return response()->json($data);
    }

    public function active(Request $request)
    {
        $input = $request->all();
        $data = $this->repository->makeModel()
            ->whereIn(Constant::WEEK, $input[Constant::WEEK])
            ->whereIn(Constant::TYPE, $input[Constant::TYPE])
            ->update([Constant::IS_ACTIVE, $input[Constant::IS_ACTIVE]]);
        return response()->json($data);
    }

    public function getActually()
    {
        $input[Constant::ORDERS] = [
            Constant::WEEK => Constant::DESC,
            Constant::TYPE => Constant::ASC,
            Constant::AREA => Constant::ASC,
            Constant::RANK => Constant::ASC,
        ];
        $input[Constant::LIMIT] = 90;
        $data = $this->repository->makeModel()
            //->where(Constant::IS_ACTIVE, 1)
            ->orders($input[Constant::ORDERS])
            ->relation([Constant::ID, Constant::NAME, Constant::IMAGE, Constant::LISTEN_NO])
            ->limit(90)
            ->get();
        return response()->json($data);
    }

    public function setActive(Request $request)
    {
        $input = $request->all();
        $data = $this->repository->makeModel()
            ->where(Constant::WEEK, $input[Constant::WEEK])
            ->update([Constant::IS_ACTIVE => $input[Constant::IS_ACTIVE]]);
        return response()->json($data);
    }
}