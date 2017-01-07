<?php
/**
 * Created by PhpStorm.
 * User: e
 * Date: 1/5/17
 * Time: 4:06 PM
 */

namespace App\Http\Controllers;

use App\Repositories\VtSongRepository;
use Illuminate\Http\Request;

class SongController
{
    protected $repository;
    public function __construct(VtSongRepository $repository)
    {
        $this->repository = $repository;
    }
    public function searchWithSinger(Request $request){
        $input = $request->all();
        $data = $this->repository
            ->makeModel()
            ->where('name', 'like', '%'.$input['name'].'%')
            ->select(['id', 'name'])
            ->simplePaginate(10);
        return response()->json($data);
    }
}