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
        $data['highlightVideos'] = $this->videoRepository->getHighLightVideos();
        $data['hotVideos'] = $this->videoRepository->getHotVideos();
        $data['newVideos'] = $this->videoRepository->getNewVideos();

        $data['banners'] = $this->bannerRepository->bannerVideos();

        $data['topics'] = $this->topicRepository->currentData();
        $data['categories'] = $this->categoryRepository->currentData();

        return response()->json($data);
    }
}