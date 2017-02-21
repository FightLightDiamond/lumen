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

    public function index(Request $request){
        $input = $request->all();
        $data['flashHotHomes'] = $this->flashHotRepository->getData();
        $data['charts'] = $this->chartsRepository->getData($input);
        $data['songHots'] = $this->songRepository->getHot();
        $data['videoHots'] = $this->videoRepository->getHot();
        $data['albumHots'] = $this->albumRepository->getHot();
        $data['news'] = $this->newsRepository->getByPage();
        $data['banners'] = $this->bannerRepository->getByPage();
        $data['topics'] = $this->topicRepository->getData();
        $data['categories'] = $this->categoryRepository->getData();

        return response()->json($data);
    }
}