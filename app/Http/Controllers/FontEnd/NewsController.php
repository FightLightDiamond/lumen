<?php
/**
 * Created by PhpStorm.
 * User: s
 * Date: 1/11/17
 * Time: 7:53 PM
 */

namespace app\Http\Controllers\FontEnd;

use App\Helper\Constant;
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

    public function index()
    {
        $data[Constant::NEWS] = $this->newsRepository->getData();
        $data[Constant::BANNERS] = $this->bannerRepository->getByPage();
        $data[Constant::TOPICS] = $this->topicRepository->getData();
        $data[Constant::CATEGORIES] = $this->categoryRepository->getData();

        return response()->json($data);
    }

    public function getDetail($identify)
    {
        $data[Constant::NEWS] = $this->newsRepository->getDetail($identify);
        $data[Constant::NEWS_OTHER] = $this->newsRepository->getOther();
        $data[Constant::BANNERS] = $this->bannerRepository->getByPage();
        $data[Constant::TOPICS] = $this->topicRepository->getData();
        $data[Constant::CATEGORIES] = $this->categoryRepository->getData();

        return response()->json($data);
    }
}