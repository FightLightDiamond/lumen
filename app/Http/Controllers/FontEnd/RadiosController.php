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
use App\Repositories\RadioRepository;
use App\Repositories\TopicRepository;

class RadiosController
{
    protected $radioRepository;
    protected $topicRepository;
    protected $categoryRepository;
    protected $bannerRepository;

    public function __construct
    (
        RadioRepository $radioRepository,
        TopicRepository $topicRepository,
        CategoriesRepository $categoriesRepository,
        BannerRepository $bannerRepository
    )
    {
        $this->radioRepository = $radioRepository;
        $this->topicRepository = $topicRepository;
        $this->categoryRepository = $categoriesRepository;
        $this->bannerRepository = $bannerRepository;
    }
    public function index(){
        $data['radios'] = $this->radioRepository->getData();
        $data['banners'] = $this->bannerRepository->getByPage();
        $data['topics'] = $this->topicRepository->getData();
        $data['categories'] = $this->categoryRepository->getData();

        return response()->json($data);
    }
    public function getDetail($identify){
        $data['radios'] = $this->radioRepository->getDetail($identify);
        $data['banners'] = $this->bannerRepository->getByPage();
        $data['topics'] = $this->topicRepository->getData();
        $data['categories'] = $this->categoryRepository->getData();

        return response()->json($data);
    }
}