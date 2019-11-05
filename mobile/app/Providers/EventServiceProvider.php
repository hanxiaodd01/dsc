<?php

namespace App\Providers;

use Laravel\Lumen\Providers\EventServiceProvider as LumenEventServiceProvider;

class EventServiceProvider extends LumenEventServiceProvider
{
    /**
     * The event listener mappings for the application.
     *
     * @var array
     */
    protected $listen = array(
        \App\Events\ExampleEvent::class => [
            \App\Listeners\ExampleListener::class,
        ]
    );
}
