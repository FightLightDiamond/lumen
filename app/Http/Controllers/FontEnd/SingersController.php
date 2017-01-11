<?php
/**
 * Created by PhpStorm.
 * User: s
 * Date: 1/11/17
 * Time: 7:40 PM
 */

namespace app\Http\Controllers\FontEnd;


use App\Repositories\BannerRepository;
use App\Repositories\CategoriesRepository;
use App\Repositories\SingerRepository;
use App\Repositories\TopicRepository;

class SingersController
{
    protected $singerRepository;
    protected $topicRepository;
    protected $categoryRepository;
    protected $bannerRepository;

    public function __construct
    (
        SingerRepository $singerRepository,
        TopicRepository $topicRepository,
        CategoriesRepository $categoriesRepository,
        BannerRepository $bannerRepository
    )
    {
        $this->singerRepository = $singerRepository;
        $this->topicRepository = $topicRepository;
        $this->categoryRepository = $categoriesRepository;
        $this->bannerRepository = $bannerRepository;
    }
    public function index(){
        $data['singers'] = $this->singerRepository->getData();
        $data['singerOfWeek'] = $this->singerRepository->getSingerOfWeek();

        $data['banners'] = $this->bannerRepository->bannerSinger();

        $data['topics'] = $this->topicRepository->currentData();
        $data['categories'] = $this->categoryRepository->currentData();

        return response()->json($data);
    }
}