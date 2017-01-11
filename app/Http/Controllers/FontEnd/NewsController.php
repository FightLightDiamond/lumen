<?php
/**
 * Created by PhpStorm.
 * User: s
 * Date: 1/11/17
 * Time: 7:53 PM
 */

namespace app\Http\Controllers\FontEnd;


use App\Repositories\BannerRepository;
use App\Repositories\CategoriesRepository;
use App\Repositories\NewsRepository;
use App\Repositories\TopicRepository;

class NewsController
{
    protected $newsRepository;
    protected $topicRepository;
    protected $categoryRepository;
    protected $bannerRepository;

    public function __construct
    (
        NewsRepository $newsRepository,
        TopicRepository $topicRepository,
        CategoriesRepository $categoriesRepository,
        BannerRepository $bannerRepository
    )
    {
        $this->newsRepository = $newsRepository;
        $this->topicRepository = $topicRepository;
        $this->categoryRepository = $categoriesRepository;
        $this->bannerRepository = $bannerRepository;
    }
    public function index(){
        $data['radios'] = $this->newsRepository->getData();

        $data['banners'] = $this->bannerRepository->bannerNews();

        $data['topics'] = $this->topicRepository->currentData();
        $data['categories'] = $this->categoryRepository->currentData();

        return response()->json($data);
    }
}