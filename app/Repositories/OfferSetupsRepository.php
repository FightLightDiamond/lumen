<?php

namespace App\Repositories;

use Prettus\Repository\Contracts\RepositoryInterface;

/**
 * Interface OfferSetupsRepository
 * @package namespace App\Repositories;
 */
interface OfferSetupsRepository extends RepositoryInterface
{
    public function saveInformation($input);
    public function statistic($date = NULL);
}
