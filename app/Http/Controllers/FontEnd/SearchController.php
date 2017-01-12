<?php
/**
 * Created by PhpStorm.
 * User: e
 * Date: 1/12/17
 * Time: 1:44 PM
 */

namespace app\Http\Controllers\FontEnd;

use App\Repositories\AlbumRepository;
use App\Repositories\CategoriesRepository;
use App\Repositories\SongRepository;
use App\Repositories\TopicRepository;
use App\Repositories\VideoRepository;
use GuzzleHttp\Psr7\Request;

class SearchController
{
    protected $songRepository;
    protected $videoRepository;
    protected $albumsRepository;
    protected $categoryRepository;
    protected $topicRepository;

    public function __construct
    (
        SongRepository $songRepository,
        VideoRepository $videoRepository,
        AlbumRepository $albumRepository,
        CategoriesRepository $categoryRepository,
        TopicRepository $topicRepository
    )
    {
        $this->songRepository = $songRepository;
        $this->videoRepository = $videoRepository;
        $this->albumsRepository = $albumRepository;
        $this->categoryRepository = $categoryRepository;
        $this->topicRepository = $topicRepository;
    }
    public function index(Request $request) {
        $input = $request->all();
        $data['songs'] = $this->songRepository->search($input);
        $data['videos'] = $this->songRepository->search($input);
        $data['albums'] = $this->songRepository->search($input);
       // $data['data'] = app('fullTextSearch')->search('$input');
        $data['topics'] = $this->topicRepository->getData();
        $data['categories'] = $this->categoryRepository->getData();
        return response()->json($data);
    }
    public function getSongSearch(Request $request){
        $input = $request->all();
        $data['songs'] = $this->songRepository->search($input);
        return response()->json($data);
    }
    public function getVideoSearch(Request $request){
        $input = $request->all();
        $data['videos'] = $this->songRepository->search($input);
        return response()->json($data);
    }
    public function getAlbumSearch(Request $request){
        $input = $request->all();
        $data['albums'] = $this->songRepository->search($input);
        return response()->json($data);
    }
}