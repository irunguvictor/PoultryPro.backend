<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\EggDetail;

class EggDetailController extends Controller
{
    
    public function index()
    {
        return response()->json(EggDetail::all());
    }

    
    public function store(Request $request)
    {
        $request->validate([
            'date'           => 'required|date',
            'opening_stock'  => 'required|integer',
            'production'     => 'required|integer',
            'sales'          => 'required|integer',
            'egg_price'      => 'sometimes|numeric'
        ]);

        // Use egg_price from request or default to 0.5
        $eggPrice = $request->input('egg_price', 0.5);
        $closingStock = $request->opening_stock + $request->production - $request->sales;
        $totalCash = $request->sales * $eggPrice;

        $eggDetail = EggDetail::create([
            'date'          => $request->date,
            'opening_stock' => $request->opening_stock,
            'production'    => $request->production,
            'sales'         => $request->sales,
            'closing_stock' => $closingStock,
            'total_cash'    => $totalCash,
        ]);

        return response()->json($eggDetail, 201);
    }
}
