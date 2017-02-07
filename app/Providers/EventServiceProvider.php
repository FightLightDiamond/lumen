<?php

namespace App\Providers;

use App\Events\LogUploadEvent;
use App\Listeners\LogUploadListener;
use Laravel\Lumen\Providers\EventServiceProvider as ServiceProvider;
use Illuminate\Contracts\Events\Dispatcher as DispatcherContract;
class EventServiceProvider extends ServiceProvider
{
    /**
     * The event listener mappings for the application.
     *
     * @var array
     */
    protected $listen = [
        'App\Events\SomeEvent' => [
            'App\Listeners\EventListener',
        ],
        LogUploadEvent::class => [
            LogUploadListener::class
        ],
    ];

//    public function boot(DispatcherContract $events)
//    {
//        //parent::boot($events);
//    }
}
