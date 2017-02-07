<?php
/**
 * Created by PhpStorm.
 * User: s
 * Date: 1/11/17
 * Time: 7:25 PM
 */

namespace app\Http\Controllers\FontEnd;


use App\Repositories\BannerRepository;
use App\Repositories\CategoriesRepository;
use App\Repositories\TopicRepository;
use App\Repositories\VideoRepository;

class VideosController
{
    protected $videoRepository;
    protected $topicRepository;
    protected $categoryRepository;
    protected $bannerRepository;

    public function __construct
    (
        VideoRepository $videoRepository,
        TopicRepository $topicRepository,
        CategoriesRepository $categoriesRepository,
        BannerRepository $bannerRepository
    )
    {
        $this->videoRepository = $videoRepository;
        $this->topicRepository = $topicRepository;
        $this->categoryRepository = $categoriesRepository;
        $this->bannerRepository = $bannerRepository;
    }
    public function index(){
        $data['highlightVideos'] = $this->videoRepository->getHighLight();
        $data['hotVideos'] = $this->videoRepository->getHot();
        $data['newVideos'] = $this->videoRepository->getNew();
        $data['banners'] = $this->bannerRepository->getByPage();
        $data['topics'] = $this->topicRepository->getData();
        $data['categories'] = $this->categoryRepository->getData();

        return response()->json($data);
    }
    public function getByType($type)
    {
        $data['videos'] = $this->videoRepository->getByType($type);
        $data['banners'] = $this->bannerRepository->getByPage('video');
        $data['topics'] = $this->topicRepository->getData();
        $data['categories'] = $this->categoryRepository->getData();

        return response()->json($data);
    }

    public function getByIdentify($identify)
    {
        $data['videos'] = $this->videoRepository->getByIdentify($identify);
        $singer_id = $data['videos']->singer()->oderby('id')->limit(1)->id;
        $data['videoSingers'] = $this->videoRepository->getBySinger($singer_id);
        $data['banners'] = $this->bannerRepository->getByPage('video');
        $data['topics'] = $this->topicRepository->getData();
        $data['categories'] = $this->categoryRepository->getData();

        return response()->json($data);
    }
}