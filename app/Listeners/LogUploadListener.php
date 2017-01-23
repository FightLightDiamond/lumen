<?php

namespace App\Listeners;

use App\Events\LogUploadEvent;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\Storage;

class LogUploadListener
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  LogUploadEvent  $event
     * @return void
     */
    public function handle(LogUploadEvent $event)
    {
        $data = "TYPE: ".$event->type." | LINK: ".$event->path."| FIX: ".env('PREFIX_UPLOAD')." | Created_by:".auth()->user()->username."|IP: ".Request::ip()." | Time: ".date('Y-m-d H:m:i');
        $file = 'log-upload.txt';
        $exists = Storage::disk('local')->exists($file);
        if($exists === false){
           Storage::disk('local')->put($file, $data);
        }
        Storage::prepend($file, $data);
    }
}
