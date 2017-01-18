<?php

namespace App\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use App\Repositories\OfferSetupsRepository;
use App\Entities\OfferSetups;
use App\Validators\OfferSetupsValidator;

/**
 * Class OfferSetupsRepositoryEloquent
 * @package namespace App\Repositories;
 */
class OfferSetupsRepositoryEloquent extends BaseRepository implements OfferSetupsRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return OfferSetups::class;
    }

    public function saveInformation($input)
    {
        $offer = $this->makeModel()->where('imei', $input['imei'])->get();
        if(count($offer) === 0)
        {
            return $this->create($input);
        } else {
            return $this->update($input, $offer[0]->id);
        }
    }

    public function statistic($date = NULL)
    {   if($date === NULL) $date = date('Y-M-d');
        $totalSetup = $this->makeModel()
            ->where('created_at', '>', $date.' 00:00')
            ->where('created_at', '<', $date.' 59:59')
            ->count();
        $finishSetup = $this->makeModel()
            ->where('created_at', '>', $date.' 00:00')
            ->where('created_at', '<', $date.' 59:59')
            ->where('status', 1)
            ->count();
        $wrongSetup = $totalSetup - $finishSetup;
        return compact('totalSetup', 'finishSetup', 'wrongSetup');
    }

    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
}
