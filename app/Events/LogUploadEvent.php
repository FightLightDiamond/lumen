<?php

namespace App\Events;

use App\Events\Event;
use App\Models\VtVideo;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;

class LogUploadEvent extends Event
{
    use SerializesModels;

    /**
     * Create a new event instance.
     *
     * @return void
     */
    public $path, $type;
    public function __construct($path, $type="image")
    {
        $this->path = $path;
        $this->type = $type;
    }

    /**
     * Get the channels the event should be broadcast on.
     *
     * @return array
     */
    public function broadcastOn()
    {
        return [];
    }
}
