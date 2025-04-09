<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Feed;

class FeedController extends Controller
{
    public function calculate(Request $request)
    {
        $request->validate([
            'avgWeight' => 'required|numeric',
            'chickenCount' => 'required|integer',
        ]);

        $feedPerChicken = $request->avgWeight * 0.1; // 10% of weight as feed
        $totalFeed = $feedPerChicken * $request->chickenCount;

        return response()->json([
            'feedPerChicken' => $feedPerChicken,
            'totalFeed' => $totalFeed
        ]);
    }
}
