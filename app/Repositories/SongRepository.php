<?php

namespace App\Repositories;

use Prettus\Repository\Contracts\RepositoryInterface;

/**
 * interface SongRepository
 * @package namespace App\Repositories;
 */
interface SongRepository extends RepositoryInterface
{
    public function getHot();
    public function getNew();
    public function getHighLight();
    public function getByType($type);
    public function getDetails($identify);
    public function getBySinger($singer_id);
}
