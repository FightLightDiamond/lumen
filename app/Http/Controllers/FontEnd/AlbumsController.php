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
    public function index(){
        $data['highlightAlbums'] = $this->albumRepository->getHighLightAlbums();
        $data['hotAlbums'] = $this->albumRepository->getHotAlbums();
        $data['newAlbums'] = $this->albumRepository->getNewAlbums();
        $data['videoAlbums'] = $this->albumRepository->getVideoAlbums();

        $data['banners'] = $this->bannerRepository->bannerAlbums();

        $data['topics'] = $this->topicRepository->currentData();
        $data['categories'] = $this->categoryRepository->currentData();

        return response()->json($data);
    }
}