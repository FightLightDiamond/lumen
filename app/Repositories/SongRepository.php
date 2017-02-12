<?php

namespace App\Repositories;

use Prettus\Repository\Contracts\RepositoryInterface;

/**
 * interface SongRepository
 * @package namespace App\Repositories;
 */
interface SongRepository extends RepositoryInterface
{
    //---------------------GET DATA----------------------
    public function getHot();

    public function getNew();

    public function getHighLight();

    public function getByType($type);

    public function getByIdentify($identify);

    //--------------------CURD---------------------------

    public function paginateAdvance($input);

    public function store($input);

    public function change($input, $model);

    public function destroy($id, $skip = 0);

    public function isActive($input);

    public function isDownload($input);
}
