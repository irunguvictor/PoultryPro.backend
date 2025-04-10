<?php
namespace App\Http\Controllers;

use App\Models\SalesExpense;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SalesExpenseController extends Controller
{
    public function index()
    {
        $expenses = Auth::user()->salesExpenses()->latest('date')->get();
        return response()->json($expenses);
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'date' => 'required|date',
            'type' => 'required|string',
            'description' => 'nullable|string',
            'amount' => 'required|numeric',
        ]);

        $expense = Auth::user()->salesExpenses()->create($data);
        return response()->json($expense, 201);
    }
}


