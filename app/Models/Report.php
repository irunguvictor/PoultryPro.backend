<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Report extends Model
{
    use HasFactory;

    protected $fillable = [
        'report_date',
        'total_sales',
        'total_expenses',
        'net_profit',
    ];
    

public function user()
{
    return $this->belongsTo(User::class);
}

}
