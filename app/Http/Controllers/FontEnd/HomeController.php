<?php
/**
 * Created by PhpStorm.
 * User: s
 * Date: 1/11/17
 * Time: 6:44 PM
 */

namespace app\Http\Controllers\FontEnd;

use App\Helper\Constant;
use App\Repositories\AlbumRepository;
use App\Repositories\BannerRepository;
use App\Repositories\CategoriesRepository;
use App\Repositories\ChartRepository;
use App\Repositories\FlashHotRepository;
use App\Repositories\NewsRepository;
use App\Repositories\SongRepository;
use App\Repositories\TopicRepository;
use App\Repositories\VideoRepository;
use Illuminate\Http\Request;

class HomeController
{
    protected $newsRepository;
    protected $songRepository;
    protected $videoRepository;
    protected $albumRepository;
    protected $flashHotRepository;
    protected $topicRepository;
    protected $categoryRepository;
    protected $chartsRepository;
    protected $bannerRepository;

    public function __construct( NewsRepository $newsRepository, SongRepository $songRepository,
        VideoRepository $videoRepository,
        AlbumRepository $albumRepository,
        FlashHotRepository $flashHotRepository,
        TopicRepository $topicRepository,
        CategoriesRepository $categoriesRepository
    )
    {
        $this->newsRepository = $newsRepository;
        $this->songRepository = $songRepository;
        $this->videoRepository = $videoRepository;
        $this->albumRepository = $albumRepository;
        $this->flashHotRepository = $flashHotRepository;
        $this->topicRepository = $topicRepository;
        $this->categoryRepository = $categoriesRepository;
    }

    public function index( ChartRepository $chartRepository, BannerRepository $bannerRepository, Request $input)
    {
        $this->chartsRepository = $chartRepository;
        $this->bannerRepository = $bannerRepository;
        $data[Constant::FLASH_HOT_HOMES] = $this->flashHotRepository->getData();
        $data[Constant::CHARTS] = $this->chartsRepository->getData($input);
        $data[Constant::SONG_HOTS] = $this->songRepository->getHot();
        $data[Constant::VIDEO_HOTS] = $this->videoRepository->getHot();
        $data[Constant::ALBUM_HOTS] = $this->albumRepository->getHot();
        $data[Constant::NEWS] = $this->newsRepository->getByPage();
        $data[Constant::BANNERS] = $this->bannerRepository->getByPage();
        $data[Constant::TOPICS] = $this->topicRepository->getData();
        $data[Constant::CATEGORIES] = $this->categoryRepository->getData();

        return response()->json($data);
    }
}