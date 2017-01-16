<?php
namespace App\Http\Tools;
use App\Repositories\OfferSetupsRepository;
use GuzzleHttp\Psr7\Request;

/**
 * Created by PhpStorm.
 * User: e
 * Date: 1/16/17
 * Time: 5:58 PM
 */
class OfferSetupsController
{
    protected $repository;
    public function __construct(OfferSetupsRepository $repository )
    {
        $this->repository = $repository;
    }
    public function getInformation(Request $request)
    {
        $input = $request->all();
        $this->repository->saveInformation($input);
    }
}