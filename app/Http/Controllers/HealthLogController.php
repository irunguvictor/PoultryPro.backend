<?php

namespace App\Http\Controllers;

use App\Models\HealthLog;
use Illuminate\Http\Request;

class HealthLogController extends Controller
{
    public function index()
    {
        return HealthLog::orderBy('date', 'desc')->get();
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'date' => 'required|date',
            'chicken_id' => 'nullable|integer',
            'description' => 'required|string',
        ]);

        return HealthLog::create($data);
    }
}

