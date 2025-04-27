<?php

namespace App\Http\Controllers;

use App\Models\SalesExpense;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class SalesExpenseController extends Controller
{
    public function index(Request $request)
    {
        Log::info('Authenticated user:', ['user' => $request->user()]);
        $items = Auth::user()->salesExpenses()->latest('date')->get();
        return response()->json($items);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'date' => 'required|date',
            'description' => 'required|string',
            'amount' => 'required|numeric',
            'type' => 'required|in:sale,expense'
        ]);

        Log::info('Authenticated user ID:', ['id' => Auth::id()]);
        Log::info('Creating sales expense with:', $validated);

        // Automatically attaches the user_id
        $item = Auth::user()->salesExpenses()->create($validated);

        return response()->json($item, 201);
    }
}
