<?php
/**
 * Created by PhpStorm.
 * User: s
 * Date: 1/16/17
 * Time: 9:23 PM
 */

use App\Entities\OfferSetups;
use Illuminate\Database\Seeder;

class OfferSetupTableSeeder extends Seeder
{
    public function run()
    {
        factory(OfferSetups::class, 100);
    }
}