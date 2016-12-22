<?php
namespace App\Services;

trait EventService {
    /**
     * Get the message that needs to be logged for the given event name.
     *
     * @param string $eventName
     * @return string
     */
    public function getActivityDescriptionForEvent($eventName)
    {
        if ($eventName == 'created')
        {
            return 'Model:'.$this->table.'|id:'.$this->id.'|action:'.$eventName;
        }

        if ($eventName == 'updated')
        {
            return 'Model:'.$this->table.'|id:'.$this->id.'|action:'.$eventName;
        }

        if ($eventName == 'deleted')
        {
            return 'Model:'.$this->table.'|id:'.$this->id.'|action:'.$eventName;
        }

        return '';
    }
}