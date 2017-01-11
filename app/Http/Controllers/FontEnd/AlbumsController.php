<?php
/**
 * Created by PhpStorm.
 * User: s
 * Date: 1/11/17
 * Time: 7:28 PM
 */

namespace app\Http\Controllers\FontEnd;


use App\Repositories\AlbumRepository;
use App\Repositories\BannerRepository;
use App\Repositories\CategoriesRepository;
use App\Repositories\TopicRepository;

class AlbumsController
{
    protected $albumRepository;
    protected $topicRepository;
    protected $categoryRepository;
    protected $bannerRepository;

    public function __construct
    (
        AlbumRepository $albumRepository,
        TopicRepository $topicRepository,
        CategoriesRepository $categoriesRepository,
        BannerRepository $bannerRepository
    )
    {
        $this->albumRepository = $albumRepository;
        $this->topicRepository = $topicRepository;
        $this->categoryRepository = $categoriesRepository;
        $this->bannerRepository = $bannerRepository;
    }
    public function index()
    {
        $data['highlightAlbums'] = $this->albumRepository->getHighLight();
        $data['hotAlbums'] = $this->albumRepository->getHot();
        $data['newAlbums'] = $this->albumRepository->getNew();
        $data['videoAlbums'] = $this->albumRepository->getVideoAlbums();
        $data['banners'] = $this->bannerRepository->getByPage();
        $data['topics'] = $this->topicRepository->getData();
        $data['categories'] = $this->categoryRepository->getData();

        return response()->json($data);
    }

    public function getByType($type)
    {
        $data['albums'] = $this->albumRepository->getByType($type);
        $data['banners'] = $this->bannerRepository->getByPage();
        $data['topics'] = $this->topicRepository->getData();
        $data['categories'] = $this->categoryRepository->getData();

        return response()->json($data);
    }

    public function getDetails($identify)
    {
        $data['albums'] = $this->albumRepository->getDetails($identify);
        $data['banners'] = $this->bannerRepository->getByPage();
        $data['topics'] = $this->topicRepository->getData();
        $data['categories'] = $this->categoryRepository->getData();

        return response()->json($data);
    }
    /**
     * Danh sach cac album khac
     */
}