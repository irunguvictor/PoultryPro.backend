<?php

namespace App\Http\Controllers;

use App\Models\Report;
use Illuminate\Http\Request;

class ReportController extends Controller
{
    public function index()
    {
        return Report::orderBy('report_date', 'desc')->get();
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'report_date' => 'required|date',
            'total_sales' => 'required|numeric',
            'total_expenses' => 'required|numeric',
            'net_profit' => 'required|numeric',
        ]);

        return Report::create($data);
    }
}

