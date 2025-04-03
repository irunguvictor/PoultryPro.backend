<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Report;

class ReportController extends Controller
{
    public function index()
    {
        return response()->json(Report::all());
    }

    public function store(Request $request)
    {
        $request->validate([
            'report_date'    => 'required|date',
            'total_sales'    => 'required|numeric',
            'total_expenses' => 'required|numeric',
            'net_profit'     => 'required|numeric',
        ]);

        $report = Report::create($request->only('report_date', 'total_sales', 'total_expenses', 'net_profit'));
        return response()->json($report, 201);
    }
}
