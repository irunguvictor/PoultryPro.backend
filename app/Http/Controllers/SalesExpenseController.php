<?php
namespace App\Http\Controllers;

use App\Models\SalesExpense;
use Illuminate\Http\Request;

class SalesExpenseController extends Controller
{
    public function index()
    {
        return SalesExpense::orderBy('date', 'desc')->get();
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'date' => 'required|date',
            'type' => 'required|string',
            'description' => 'nullable|string',
            'amount' => 'required|numeric',
        ]);

        return SalesExpense::create($data);
    }
}


