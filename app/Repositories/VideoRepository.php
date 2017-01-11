<?php

namespace App\Repositories;

use Prettus\Repository\Contracts\RepositoryInterface;

/**
 * interface VideoRepository
 * @package namespace App\Repositories;
 */
interface VideoRepository extends RepositoryInterface
{
    public function getHot();
    public function getNew();
    public function getHighLight();
    public function getByType($type);
    public function getDetails($identify);
    public function getBySinger($singer_id);
}
