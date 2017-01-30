<?php

namespace App\Repositories;

use Prettus\Repository\Contracts\RepositoryInterface;

/**
 * interface SingerRepository
 * @package namespace App\Repositories;
 */
interface SingerRepository extends RepositoryInterface
{
    public function getData();
    public function getSingerOfWeek();
    public function getDetail($slug);

    public function store($input);
    public function change($input, $model);
}
