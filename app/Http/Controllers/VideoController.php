<?php
/**
 * Created by PhpStorm.
 * User: e
 * Date: 1/5/17
 * Time: 4:07 PM
 */

namespace App\Http\Controllers\FontEnd;


use App\Repositories\VideoRepository;

class VideoController
{
    protected $repository;
    public function __construct(VideoRepository $repository)
    {
        $this->repository = $repository;
    }
    public function searchWithSinger(){
        $data = $this->repository->simplePaginate(10, ['id', 'name']);
        return response()->json($data);
    }
}