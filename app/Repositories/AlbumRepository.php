<?php

namespace App\Repositories;

use Prettus\Repository\Contracts\RepositoryInterface;

/**
 * interface AlbumRepository
 * @package namespace App\Repositories;
 */
interface AlbumRepository extends RepositoryInterface
{
    public function getHighLight();
    public function getHot();
    public function getNew();
    public function getVideoAlbums();
    public function getByType($type);
    public function getByIdentify($identify);
}
