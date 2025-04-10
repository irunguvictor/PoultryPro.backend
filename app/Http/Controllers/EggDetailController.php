<?php

namespace App\Http\Controllers;

use App\Models\EggDetail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EggDetailController extends Controller
{
    public function index()
    {
        // ✅ Use the correct relationship method
        $eggDetails = Auth::user()->eggDetails()->latest()->get();

        return response()->json($eggDetails);
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'date' => 'required|date',
            'opening_stock' => 'required|numeric',
            'production' => 'required|numeric',
            'sales' => 'required|numeric',
            'closing_stock' => 'required|numeric',
            'total_cash' => 'required|numeric',
        ]);

        // ✅ Attach the new entry to the authenticated user
        $eggDetail = Auth::user()->eggDetails()->create($data);

        return response()->json($eggDetail, 201);
    }
}
