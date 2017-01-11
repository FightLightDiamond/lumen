<?php
/**
 * Created by PhpStorm.
 * User: s
 * Date: 1/11/17
 * Time: 7:36 PM
 */

namespace app\Http\Controllers\FontEnd;


use App\Repositories\BannerRepository;
use App\Repositories\CategoriesRepository;
use App\Repositories\ChartRepository;
use App\Repositories\TopicRepository;

class ChartsController
{
    protected $chartsRepository;
    protected $bannerRepository;
    protected $topicRepository;
    protected $categoryRepository;

    public function __construct
    (
        ChartRepository $ChartsRepository,
        BannerRepository $bannerRepository,
        TopicRepository $topicRepository,
        CategoriesRepository $categoryRepository
    )
    {
        $this->chartsRepository = $ChartsRepository;
        $this->bannerRepository = $bannerRepository;
        $this->topicRepository = $topicRepository;
        $this->categoryRepository = $categoryRepository;
    }
    public function index(){
        $data['charts'] = $this->chartsRepository->getData();

        //$data['banners'] = $this->bannerRepository->bannerCharts();

        return response()->json($data);
    }

    public function getDetail($type, $area){
        $data['charts'] = $this->chartsRepository->getDetail($type, $area);
        $data['banners'] = $this->bannerRepository->getByPage();
        $data['topics'] = $this->topicRepository->getData();
        $data['categories'] = $this->categoryRepository->getData();

        return response()->json($data);
    }
}