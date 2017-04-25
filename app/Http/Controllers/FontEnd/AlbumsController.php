<?php
/**
 * Created by PhpStorm.
 * User: s
 * Date: 1/11/17
 * Time: 7:28 PM
 */

namespace app\Http\Controllers\FontEnd;


use App\Helper\Constant;
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
        $data[Constant::HIGHLIGHT_ALBUMS] = $this->albumRepository->getHighLight();
        $data[Constant::HOT_SONGS] = $this->albumRepository->getHot();
        $data[Constant::NEW_ALBUMS] = $this->albumRepository->getNew();
        $data[Constant::VIDEO_ALBUMS] = $this->albumRepository->getVideoAlbums();
        $data[Constant::BANNERS] = $this->bannerRepository->getByPage();
        $data[Constant::TOPICS] = $this->topicRepository->getData();
        $data[Constant::CATEGORIES] = $this->categoryRepository->getData();

        return response()->json($data);
    }

    public function getByType($type)
    {
        $data[Constant::ALBUMS] = $this->albumRepository->getByType($type);
        $data[Constant::BANNERS] = $this->bannerRepository->getByPage();
        $data[Constant::TOPICS] = $this->topicRepository->getData();
        $data[Constant::CATEGORIES] = $this->categoryRepository->getData();

        return response()->json($data);
    }

    public function getByIdentify($identify)
    {
        $data[Constant::ALBUMS] = $this->albumRepository->getByIdentify($identify);
        $data[Constant::BANNERS] = $this->bannerRepository->getByPage();
        $data[Constant::TOPICS] = $this->topicRepository->getData();
        $data[Constant::CATEGORIES] = $this->categoryRepository->getData();

        return response()->json($data);
    }
    /**
     * Danh sach cac album khac
     */
}