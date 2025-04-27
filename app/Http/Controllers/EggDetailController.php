<?php

namespace App\Http\Controllers;

use App\Models\EggDetail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EggDetailController extends Controller
{
    public function index()
    {
        $eggDetails = Auth::user()->eggDetails()->latest()->get();
        return response()->json($eggDetails);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'date' => 'required|date',
            'egg_price' => 'required|numeric|min:0',
            'opening_stock' => 'required|numeric|min:0',
            'production' => 'required|numeric|min:0',
            'sales' => 'required|numeric|min:0',
        ]);

        // Calculate closing stock and revenue
        $closing_stock = $validated['opening_stock'] + $validated['production'] - $validated['sales'];
        $revenue = $validated['sales'] * $validated['egg_price'];

        $eggDetail = Auth::user()->eggDetails()->create([
            ...$validated,
            'closing_stock' => $closing_stock,
            'revenue' => $revenue, 
        ]);

        return response()->json($eggDetail, 201);
    }
}
