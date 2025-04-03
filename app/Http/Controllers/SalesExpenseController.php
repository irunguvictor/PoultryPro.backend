<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\SalesExpense;

class SalesExpenseController extends Controller
{
    public function index()
    {
        return response()->json(SalesExpense::all());
    }

    public function store(Request $request)
    {
        $request->validate([
            'date'        => 'required|date',
            'type'        => 'required|in:sale,expense',
            'description' => 'required|string',
            'amount'      => 'required|numeric',
        ]);

        $salesExpense = SalesExpense::create($request->only('date', 'type', 'description', 'amount'));
        return response()->json($salesExpense, 201);
    }
}
