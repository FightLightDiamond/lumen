<?php

namespace App\Repositories;

use Prettus\Repository\Contracts\RepositoryInterface;

/**
 * Interface VocabularyRepository
 * @package namespace App\Repositories;
 */
interface VocabularyRepository extends RepositoryInterface
{
    public function store($input);
    public function change($input, $model);
    public function destroy($id, $skip = 0);
}
