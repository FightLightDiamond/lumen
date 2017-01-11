<?php
/**
 * Created by PhpStorm.
 * User: s
 * Date: 1/11/17
 * Time: 6:44 PM
 */

namespace app\Http\Controllers\FontEnd;


use App\Repositories\AlbumRepository;
use App\Repositories\BannerRepository;
use App\Repositories\CategoriesRepository;
use App\Repositories\ChartRepository;
use App\Repositories\FlashHotRepository;
use App\Repositories\NewsRepository;
use App\Repositories\SongRepository;
use App\Repositories\TopicRepository;
use App\Repositories\VideoRepository;

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

    public function __construct
    (
        NewsRepository $newsRepository,
        SongRepository $songRepository,
        VideoRepository $videoRepository,
        AlbumRepository $albumRepository,
        FlashHotRepository $flashHotRepository,
        TopicRepository $topicRepository,
        CategoriesRepository $categoriesRepository,
        ChartRepository $chartRepository,
        BannerRepository $bannerRepository
    )
    {
        $this->newsRepository = $newsRepository;
        $this->songRepository = $songRepository;
        $this->videoRepository = $videoRepository;
        $this->albumRepository = $albumRepository;
        $this->flashHotRepository = $flashHotRepository;
        $this->topicRepository = $topicRepository;
        $this->categoryRepository = $categoriesRepository;
        $this->chartsRepository = $chartRepository;
        $this->bannerRepository = $bannerRepository;
    }

    public function index(){
        $data['flashHotHomes'] = $this->flashHotRepository->currentData();
        $data['charts'] = $this->chartsRepository->currentData();

        $data['songHots'] = $this->songRepository->songHots();
        $data['videoHots'] = $this->videoRepository->videoHots();
        $data['albumHots'] = $this->albumRepository->albumHots();

        $data['news'] = $this->albumRepository->newsHome();

        $data['banners'] = $this->bannerRepository->bannerHomes();

        $data['topics'] = $this->topicRepository->currentData();
        $data['categories'] = $this->categoryRepository->currentData();

        return response()->json($data);
    }
}