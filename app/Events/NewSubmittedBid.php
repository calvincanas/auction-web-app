<?php

namespace App\Events;

use App\Models\BidEntry;
use App\Models\Product;
use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class NewSubmittedBid implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $product;
    public $bidData;

    /**
     * Create a new event instance.
     */
    public function __construct(array $bidData, Product $product)
    {
        $this->product = $product;
        $this->bidData = $bidData;
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return PrivateChannel
     */
    public function broadcastOn(): Channel
    {
        return new PrivateChannel('bid.' .  $this->product->id);
    }
}
