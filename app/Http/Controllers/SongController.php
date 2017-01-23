<?php
/**
 * Created by PhpStorm.
 * User: e
 * Date: 1/5/17
 * Time: 4:06 PM
 */

namespace App\Http\Controllers;

use App\Repositories\SongRepository;
use Illuminate\Http\Request;

class SongController
{
    protected $repository;

    public function __construct(SongRepository $repository)
    {
        $this->repository = $repository;
    }

    public function index(Request $request)
    {
        $input = $request->all();
        $data = $this->repository->paginateAdvance($input);
        return response()->json($data);
    }

    public function show($id)
    {
        $data = $this->repository->find($id);
        return response()->json($data);
    }

    public function store(Request $request) {
        $input = $request->all();
        $data = $this->repository->store($input);
        return response()->json($data);
    }

    public function update($id, Request $request)
    {
        $input = $request->all();
        $model = $this->repository->find($id);
        if ($model) {
            $data = $this->repository->change($input, $model);
            return response()->json($data);
        } else {
            return response()->json(false);
        }
    }

    public function destroy($id)
    {
        $data = $this->repository->delete($id);
        return response()->json($data);
    }

    public function searchWithSinger(Request $request)
    {
        $input = $request->all();
        $data = $this->repository
            ->makeModel()
            ->where('name', 'like', '%' . $input['name'] . '%')
            ->select(['id', 'name'])
            ->simplePaginate(10);
        return response()->json($data);
    }
}