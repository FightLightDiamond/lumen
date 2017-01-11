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
        $data['banners'] = $this->bannerRepository->getByPage();
        $data['topics'] = $this->topicRepository->getData();
        $data['categories'] = $this->categoryRepository->getData();

        return response()->json($data);
    }
    public function getDetail($slug){
        $data['singer'] = $this->singerRepository->getDetail($slug);
        $data['songSingers'] = $data['singer']->song()->paginate(10);
        $data['videoSingers'] = $data['singer']->video()->paginate(10);
        $data['albumSingers'] = $data['singer']->singer()->paginate(10);
        $data['banners'] = $this->bannerRepository->getByPage();
        $data['topics'] = $this->topicRepository->getData();
        $data['categories'] = $this->categoryRepository->getData();

        return response()->json($data);
    }
}