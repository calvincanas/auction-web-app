<?php

namespace App\Http\Controllers;

use App\Events\NewSubmittedBid;
use App\Models\BidEntry;
use Illuminate\Http\Request;

class NewBidController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        // fixed increment na lang, pwedeng gawin dito set ung increment per bid session
        BidEntry::create([
            'user_id' => auth()->id(),
            'amount' => '20'
        ]);

        $total = BidEntry::query()->count();
        $lastBiddger = BidEntry::query()->orderByDesc('created_at')->first();

        $data = [
            'amount' => $total * 20,
            'last_bidder' => $lastBiddger->user,
        ];

        NewSubmittedBid::dispatch($data);

        return $data;
    }
}
