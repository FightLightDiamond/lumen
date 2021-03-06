<?php
/**
 * Created by PhpStorm.
 * User: e
 * Date: 1/5/17
 * Time: 4:07 PM
 */

namespace App\Http\Controllers;


use App\Repositories\AlbumRepository;

class AlbumController
{
    protected $repository;
    public function __construct(AlbumRepository $repository)
    {
        $this->repository = $repository;
    }
    public function searchWithSinger(){
        $data = $this->repository->simplePaginate(10, ['id', 'name']);
        return response()->json($data);
    }
}