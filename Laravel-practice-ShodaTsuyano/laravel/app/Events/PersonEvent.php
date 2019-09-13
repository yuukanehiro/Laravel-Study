<?php

namespace App\Events;

use Illuminate\Queue\SerializesModels;
use App\Models\Person;

class PersonEvent
{
    use SerializesModels;

    public $person;

    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct(Person $person)
    {
        $this->person = $person;
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return \Illuminate\Broadcasting\Channel|array
     */
    public function broadcastOn()
    {
        return new PrivateChannel('channel-name');
    }
}
