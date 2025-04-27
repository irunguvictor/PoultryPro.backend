<?php

namespace App\Http\Controllers;

use App\Models\Feed;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
class FeedController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index() {
        return Auth::user()->feeds()->latest()->get();
      }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $req) {
        $v = $req->validate([
          'date' => 'required|date',
          'chicken_count' => 'required|integer|min:1',
          'per_chicken_kg' => 'required|numeric|min:0.01',
          'total_feed_kg' => 'required|numeric|min:0.01',
            ]);
    
        $feed = Auth::user()->feeds()->create($v);
            return response()->json($feed, 201);
        }

    /**
     * Display the specified resource.
     */
    public function show(Feed $feed)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Feed $feed)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Feed $feed)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Feed $feed)
    {
        //
    }
}
