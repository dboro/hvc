<?php

namespace App\Ship\Parents\Providers;

use Apiato\Core\Abstracts\Providers\EventsProvider as AbstractEventsProvider;
use App\Containers\HvcSection\HvcVersion\Events\DefaultEvent;
use App\Containers\HvcSection\HvcVersion\Listeners\DefaultListener;

/**
 * Class EventsProvider
 *
 * A.K.A app/Providers/EventsServiceProvider.php
 *
 * @author  Mahmoud Zalt  <mahmoud@zalt.me>
 */
class EventsProvider extends AbstractEventsProvider
{
    /**
     * The event listener mappings for the application.
     *
     * @var array
     */
    protected $listen = [

    ];


    /**
     * Register any other events for your application.
     *
     * @return void
     */
    public function boot(): void
    {
        parent::boot();
    }
}
