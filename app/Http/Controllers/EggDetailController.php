<?php

namespace App\Http\Controllers;

use App\Models\EggDetail;
use Illuminate\Http\Request;

class EggDetailController extends Controller
{
    public function index()
    {
        return EggDetail::orderBy('date', 'desc')->get();
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'date' => 'required|date',
            'opening_stock' => 'required|numeric',
            'production' => 'required|numeric',
            'sales' => 'required|numeric',
            'closing_stock' => 'required|numeric',
            'total_cash' => 'required|numeric',
        ]);

        return EggDetail::create($data);
    }
}
