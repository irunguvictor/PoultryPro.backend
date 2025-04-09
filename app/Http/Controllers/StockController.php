<?php

namespace App\Http\Controllers;

use App\Models\Stock;
use Illuminate\Http\Request;

class StockController extends Controller
{
    public function index()
    {
        return Stock::orderBy('date', 'desc')->get();
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'date' => 'required|date',
            'item_name' => 'required|string',
            'quantity' => 'required|integer',
        ]);

        return Stock::create($data);
    }
}

