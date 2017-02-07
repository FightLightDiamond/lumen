<?php

namespace App\Repositories;

use Prettus\Repository\Contracts\RepositoryInterface;

/**
 * Interface NewsRepository
 * @package namespace App\Repositories;
 */
interface NewsRepository extends RepositoryInterface
{
    public function getByPage();
    public function getData();
    public function getDetail($identify);
    public function getOther();
}
