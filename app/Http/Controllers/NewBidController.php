<?php

namespace App\Http\Controllers;

use App\Events\NewSubmittedBid;
use App\Models\BidEntry;
use App\Models\Product;
use Illuminate\Http\Request;

class NewBidController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request, Product $product)
    {
        // fixed increment na lang, pwedeng gawin dito set ung increment per bid session
        BidEntry::create([
            'user_id' => auth()->id(),
            'product_id' => $product->id,
            'amount' => '20'
        ]);

        $total = BidEntry::where('product_id', $product->id)->count();
        $lastBidder = BidEntry::where('product_id', $product->id)->orderByDesc('created_at')->first();

        $data = [
            'amount' => $total * 20,
            'bid_entry' => $lastBidder->load('user', 'product'),
        ];

        NewSubmittedBid::dispatch($data, $product);

        return $data;
    }
}
