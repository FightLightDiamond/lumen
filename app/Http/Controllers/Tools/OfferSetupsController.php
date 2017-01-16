<?php
namespace App\Http\Controllers\Tools;
use App\Repositories\OfferSetupsRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

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
    public function index(Request $request)
    {
        $data = $this->repository->paginate(10);
        return response()->json($data);
    }
    public function setInformation(Request $request)
    {
        $input = $request->all();
        $validator = Validator::make($request->all(), [
            'imei' => 'required|max:48',
            'number_phone' => 'number',
        ]);
        if ($validator->fails()) {
            return response()->json($validator->errors());
        } else {
            $data = $this->repository->saveInformation($input);
            return response()->json($data);
        }
    }
    public function checkOffer($id, Request $request)
    {
        $offer = $this->repository->find($id);
        $data =  'OK';
        if($offer)
        {
            $mocha = app('curl')->getData(config('offer.mocha'));
            $mocha = app('curl')->getData(config('offer.net_news'));
            $mocha = app('curl')->getData(config('offer.mocha'));
            //return
            //fun2
            //return
            //fun2
            if(true)
            {
                $input = $request->all();
                $input['code'] = str_random(10);
                $data = $this->repository->update($input , $id);
                if($data)
                {
                    $data = 'UPDATE_FAIL';
                }
            }

        }
        return response()->json($data);
    }
}