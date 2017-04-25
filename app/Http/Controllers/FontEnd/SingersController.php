<?php
/**
 * Created by PhpStorm.
 * User: s
 * Date: 1/11/17
 * Time: 7:40 PM
 */

namespace app\Http\Controllers\FontEnd;

use App\Helper\Constant;
use App\Repositories\BannerRepository;
use App\Repositories\CategoriesRepository;
use App\Repositories\SingerRepository;
use App\Repositories\TopicRepository;
use Illuminate\Support\Facades\DB;

class SingersController
{
    protected $singerRepository;
    protected $topicRepository;
    protected $categoryRepository;
    protected $bannerRepository;

    public function __construct
    (
        SingerRepository $singerRepository,
        TopicRepository $topicRepository,
        CategoriesRepository $categoriesRepository,
        BannerRepository $bannerRepository
    )
    {
        $this->singerRepository = $singerRepository;
        $this->topicRepository = $topicRepository;
        $this->categoryRepository = $categoriesRepository;
        $this->bannerRepository = $bannerRepository;
    }
    public function index(){
        $data[Constant::SINGERS] = $this->singerRepository->getData();
        $data[Constant::SINGER_OF_WEEK] = $this->singerRepository->getSingerOfWeek();
        $data[Constant::BANNERS] = $this->bannerRepository->getByPage();
        $data[Constant::TOPICS] = $this->topicRepository->getData();
        $data[Constant::CATEGORIES] = $this->categoryRepository->getData();

        return response()->json($data);
    }
    public function getDetail($slug){
        $data[Constant::SINGERS] = $this->singerRepository->getDetail($slug);
        $data['songSingers'] = $data['singer']->song()->paginate(10);
        $data['videoSingers'] = $data['singer']->video()->paginate(10);
        $data['albumSingers'] = $data['singer']->singer()->paginate(10);
        $data[Constant::BANNERS] = $this->bannerRepository->getByPage();
        $data[Constant::TOPICS] = $this->topicRepository->getData();
        $data[Constant::CATEGORIES] = $this->categoryRepository->getData();

        return response()->json($data);
    }
    public function paginateSong($singer_id){
        DB::table('song_singer')->where('singer_id', $singer_id)
            ->with('song')
            ->simplePaginate(10);
        $this->singerRepository->makeModel();

        DB::table('song_singer')
            ->where('song_singe.singer_id', $singer_id)
            ->rightJoin('songs', function ($join)
            {
                $join->on('songs.id', '=', 'song_singer.id')
                    ->where('songs.is_active', 1);
            })
            ->simplePaginate(10);

        DB::table('songs')->where('songs.is_active', 1)
            ->leftJoin('song_singer', function ($join) use($singer_id)
            {
                $join->on('songs.id', '=', 'song_singer.id')
                    ->where('song_singe.singer_id', $singer_id);
            })
            ->simplePaginate(10);
    }

}