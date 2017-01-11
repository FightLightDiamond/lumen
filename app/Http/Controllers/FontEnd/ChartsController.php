<?php
/**
 * Created by PhpStorm.
 * User: s
 * Date: 1/11/17
 * Time: 7:36 PM
 */

namespace app\Http\Controllers\FontEnd;


use App\Repositories\BannerRepository;
use App\Repositories\ChartRepository;

class ChartsController
{
    protected $chartsRepository;
    protected $bannerRepository;

    public function __construct
    (
        ChartRepository $ChartsRepository,
        BannerRepository $bannerRepository
    )
    {
        $this->chartsRepository = $ChartsRepository;

       // $this->bannerRepository = $bannerRepository;
    }
    public function index(){
        $data['charts'] = $this->chartsRepository->getCurrentData();

        //$data['banners'] = $this->bannerRepository->bannerCharts();

        return response()->json($data);
    }
}