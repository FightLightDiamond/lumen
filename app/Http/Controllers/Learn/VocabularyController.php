<?php
namespace App\Http\Controllers\Learn;
use App\Repositories\VocabularyRepository;
use Illuminate\Http\Request;

/**
 * Created by PhpStorm.
 * User: e
 * Date: 3/1/17
 * Time: 3:32 PM
 */
class VocabularyController
{
    private $repository;
    public function __construct(VocabularyRepository $repository)
    {
        $this->repository = $repository;
    }
    public function index() {
        $data = $this->repository
            ->makeModel()
            ->orderBy('id', 'DESC')->paginate(8);
        return response()->json($data);
    }
    public function create(Request $request) {
        $input = $request->all();
        return $this->repository->store($input);
    }
    public function update($id, Request $request) {
        $input = $request->all();
        return $this->repository->update($input, $id);
    }

    public function destroy($id, Request $request) {
        $data =  $this->repository->destroy($id, $request->get('take'));
        return response()->json($data);
    }
    public function find() {

    }
}