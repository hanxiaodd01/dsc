<?php

namespace App\Console;

class Kernel extends \Laravel\Lumen\Console\Kernel
{
    /**
     * The Artisan commands provided by your application.
     *
     * @var array
     */
    protected $commands = array(
        // @louv 2019-10-30: close CustomerService temporally due to lack of workerMan
//        'App\\Console\\Commands\\CustomerService',

        'App\\Console\\Commands\\ProjectRelease',
        'App\\Console\\Commands\\RestoreController',
        'App\\Console\\Commands\\RestoreModels'
    );

    protected function schedule(\Illuminate\Console\Scheduling\Schedule $schedule)
    {
    }
}
