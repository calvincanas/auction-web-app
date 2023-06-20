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
        return view('dashboard.index');
    }
}
