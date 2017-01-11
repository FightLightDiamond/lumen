<?php
/**
 * Created by PhpStorm.
 * User: s
 * Date: 1/11/17
 * Time: 7:17 PM
 */

namespace app\Http\Controllers\FontEnd;


use App\Repositories\BannerRepository;
use App\Repositories\CategoriesRepository;
use App\Repositories\SongRepository;
use App\Repositories\TopicRepository;

class SongsController
{
    protected $songRepository;
    protected $topicRepository;
    protected $categoryRepository;
    protected $bannerRepository;

    public function __construct
    (
        SongRepository $songRepository,
        TopicRepository $topicRepository,
        CategoriesRepository $categoriesRepository,
        BannerRepository $bannerRepository
    )
    {
        $this->songRepository = $songRepository;
        $this->topicRepository = $topicRepository;
        $this->categoryRepository = $categoriesRepository;
        $this->bannerRepository = $bannerRepository;
    }
    public function index() {
        $data['highlightSongs'] = $this->songRepository->getHighLight();
        $data['hotSongs'] = $this->songRepository->getHot();
        $data['newSongs'] = $this->songRepository->getNew();
        $data['banners'] = $this->bannerRepository->getByPage();
        $data['topics'] = $this->topicRepository->getData();
        $data['categories'] = $this->categoryRepository->getData();

        return response()->json($data);
    }
    public function getByType($type)
    {
        $data['songs'] = $this->songRepository->getByType($type);
        $data['banners'] = $this->bannerRepository->getByPage();
        $data['topics'] = $this->topicRepository->getData();
        $data['categories'] = $this->categoryRepository->getData();

        return response()->json($data);
    }

    public function getDetails($identify)
    {
        $data['songs'] = $this->songRepository->getDetails($identify);
        $singer_id = $data['songs']->singer()->oderby('id')->limit(1)->id;
        $data['songSingers'] = $this->songRepository->getBySinger($singer_id);
        $data['banners'] = $this->bannerRepository->getByPage('song');
        $data['topics'] = $this->topicRepository->getData();
        $data['categories'] = $this->categoryRepository->getData();

        return response()->json($data);
    }
}