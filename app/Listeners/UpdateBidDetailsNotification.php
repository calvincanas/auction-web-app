<?php

namespace App\Listeners;

use App\Events\NewSubmittedBid;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class UpdateBidDetailsNotification
{
    /**
     * Create the event listener.
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     */
    public function handle(NewSubmittedBid $event): void
    {
        //
    }
}
