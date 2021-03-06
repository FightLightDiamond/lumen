<?php

namespace App\Repositories;

use Prettus\Repository\Contracts\RepositoryInterface;

/**
 * Interface RadioRepository
 * @package namespace App\Repositories;
 */
interface RadioRepository extends RepositoryInterface
{
    public function getData();
    public function getDetail($identify);
}
