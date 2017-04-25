<?php
/**
 * Created by PhpStorm.
 * User: e
 * Date: 1/5/17
 * Time: 4:07 PM
 */

namespace App\Http\Controllers;


use App\Helper\Constant;
use App\Repositories\VideoRepository;

class VideoController
{
    protected $repository;

    public function __construct(VideoRepository $repository)
    {
        $this->repository = $repository;
    }

    public function searchWithSinger()
    {
        $data = $this->repository->simplePaginate(10, [Constant::ID, Constant::NAME]);
        return response()->json($data);
    }
}