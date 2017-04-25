<?php
/**
 * Created by PhpStorm.
 * User: s
 * Date: 1/27/17
 * Time: 8:53 PM
 */

namespace app\Http\Controllers;


use App\Helper\Constant;
use App\Repositories\SingerRepository;
use Illuminate\Http\Request;

class SingerController
{
    public $repository;
    public function __construct(SingerRepository $repository)
    {
        $this->repository = $repository;
    }

    public function index(Request $request)
    {
        $orders = [
          Constant::ID => Constant::DESC
        ];
        $input = $request->all();

        if (!isset($input[Constant::PER_PAGE])) {
            $input[Constant::PER_PAGE] = 8;
        }
        $data = $this->repository->makeModel()
            ->orders($orders)
            ->filter($input)
            ->paginate($input[Constant::PER_PAGE]);
        return response()->json($data);
    }

    public function store(Request $request)
    {
        $input = $request->all();
        $data = $this->repository->store($input);
        if ($data) {
            return response()->json($data);
        }
        return response()->json('Create error', 500);
    }

    public function update($id, Request $request)
    {
        $input = $request->all();
        $result = $this->repository->find($id);
        if ($result) {
            $data = $this->repository->change($input, $result);
            if ($data) {
                return response()->json($data);
            }
            return response()->json('Update Error', 500);
        }
        return response()->json('Not found item', 200);
    }

    public function find($id)
    {
        $data = $this->repository->find($id);
        if ($data) {
            return response()->json($data);
        }
        return response()->json('Not found item', 200);
    }

    public function destroy($id, Request $request)
    {
        $data = $this->repository->destroy($id, $request->get(Constant::SKIP));
        if ($data) {
            return response()->json($data);
        }
        return response()->json('Delete Error', 200);
    }
}