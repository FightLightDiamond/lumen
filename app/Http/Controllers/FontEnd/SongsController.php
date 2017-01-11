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
        $data['highlightSongs'] = $this->songRepository->getHighLightSongs();
        $data['hotSongs'] = $this->songRepository->getHotSongs();
        $data['newSongs'] = $this->songRepository->getNewSongs();

        $data['banners'] = $this->bannerRepository->bannerSongs();

        $data['topics'] = $this->topicRepository->currentData();
        $data['categories'] = $this->categoryRepository->currentData();

        return response()->json($data);
    }
    public function getHotDetail() {

    }
}