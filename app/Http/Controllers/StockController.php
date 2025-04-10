<?php
namespace App\Http\Controllers;

use App\Models\Stocks;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class StockController extends Controller
{
    public function index()
    {
        $stocks = Auth::user()->stocks()->latest('date')->get();
        return response()->json($stocks);
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'date' => 'required|date',
            'item_name' => 'required|string',
            'quantity' => 'required|integer',
        ]);

        $stock = Auth::user()->stocks()->create($data);
        return response()->json($stock, 201);
    }
}

