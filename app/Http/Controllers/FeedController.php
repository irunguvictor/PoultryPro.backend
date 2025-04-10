<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Feed;
use Illuminate\Support\Facades\Auth;

class FeedController extends Controller
{
    public function calculate(Request $request)
    {
        $request->validate([
            'avgWeight' => 'required|numeric',
            'chickenCount' => 'required|integer',
        ]);

        $feedPerChicken = $request->avgWeight * 0.1;
        $totalFeed = $feedPerChicken * $request->chickenCount;

        return response()->json([
            'feedPerChicken' => $feedPerChicken,
            'totalFeed' => $totalFeed
        ]);
    }

    public function index()
    {
        $feeds = Auth::user()->feeds()->latest()->get();
        return response()->json($feeds);
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'date' => 'required|date',
            'quantity' => 'required|numeric',
        ]);

        $feed = Auth::user()->feeds()->create($data);
        return response()->json($feed, 201);
    }
}
