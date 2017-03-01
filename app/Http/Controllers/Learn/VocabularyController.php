<?php
namespace App\Http\Controllers\Learn;
use App\Repositories\VocabularyRepository;
use GuzzleHttp\Psr7\Request;

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
        $this->repository->paginate(10);
    }
    public function create(Request $request) {
        $input = $request->all();
        return $this->repository->create($input);
    }
    public function update($id, Request $request) {
        $input = $request->all();
        return $this->repository->update($input, $id);
    }
    public function destroy($id) {
        return $this->repository->destroy($id);
    }
    public function find() {

    }
}