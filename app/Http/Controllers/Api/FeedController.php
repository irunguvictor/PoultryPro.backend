<?php

namespace App\Http\Controllers;

use App\Models\Feed;
use Illuminate\Http\Request;

class FeedController extends Controller
{
    public function index()
    {
        return response()->json(Feed::all());
    }

    public function store(Request $request)
    {
        $request->validate([
            'type' => 'required|string',
            'quantity' => 'required|numeric',
            'chickens_count' => 'required|integer',
            'avg_weight' => 'required|numeric',
            'date' => 'required|date',
        ]);

        $feed = Feed::create($request->all());
        return response()->json($feed, 201);
    }

    public function show($id)
    {
        return response()->json(Feed::findOrFail($id));
    }

    public function update(Request $request, $id)
    {
        $feed = Feed::findOrFail($id);
        $feed->update($request->all());
        return response()->json($feed);
    }

    public function destroy($id)
    {
        Feed::destroy($id);
        return response()->json(['message' => 'Feed record deleted']);
    }
}
