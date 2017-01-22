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
    public function index() {

    }
    public function show($id) {

    }
    public function create() {

    }
    public function store(Request $request) {
        $input = $request->all();
       // var_dump($input['file']);
        $this->repository->makeModel()->uploads($input);
        return response()->json($input['cuong']);
    }
    public function update($id) {

    }
    public function destroy($id) {

    }
    public function searchWithSinger(Request $request) {
        $input = $request->all();
        $data = $this->repository
            ->makeModel()
            ->where('name', 'like', '%'.$input['name'].'%')
            ->select(['id', 'name'])
            ->simplePaginate(10);
        return response()->json($data);
    }
}