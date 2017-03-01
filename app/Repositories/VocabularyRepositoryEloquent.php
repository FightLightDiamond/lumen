<?php

namespace App\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use App\Repositories\vocabularyRepository;
use App\Entities\Vocabulary;
use App\Validators\VocabularyValidator;

/**
 * Class VocabularyRepositoryEloquent
 * @package namespace App\Repositories;
 */
class VocabularyRepositoryEloquent extends BaseRepository implements VocabularyRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return Vocabulary::class;
    }

    public function store($input) {
        $input = $this->standardized($input, $this->makeModel());
        return $this->create($input);

    }
    public function change($input, $model) {
        $input = $this->standardized($input, $model);
        return $this->update($input, $model);
    }
    public function destroy($id, $skip = 0) {
        $this->delete($id);
    }

    private function standardized($input, $model)
    {
        $input = $model->uploads($input);
        $input = $model->checkbox($input);
        return $input;
    }

    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
}
