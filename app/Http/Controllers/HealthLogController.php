<?php
namespace App\Http\Controllers;

use App\Models\HealthLog;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HealthLogController extends Controller
{
    public function index()
    {
        $logs = Auth::user()->healthLogs()->latest('date')->get();
        return response()->json($logs);
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'date' => 'required|date',
            'chicken_id' => 'nullable|integer',
            'description' => 'required|string',
        ]);

        $log = Auth::user()->healthLogs()->create($data);
        return response()->json($log, 201);
    }
}
