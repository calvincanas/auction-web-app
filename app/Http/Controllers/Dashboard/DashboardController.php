<?php

namespace App\Http\Controllers\Dashboard;

use App\Events\NewSubmittedBid;
use App\Events\ShoutoutToUser;
use App\Http\Controllers\Controller;
use App\Models\BidEntry;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $total = BidEntry::query()->count();
        $lastBiddger = BidEntry::query()->orderByDesc('created_at')->first();

        $data = [
            'amount' => $total * 20,
            'last_bidder' => $lastBiddger->user,
        ];

        return view('dashboard.index', $data);
    }
}
