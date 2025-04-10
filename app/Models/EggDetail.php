<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EggDetail extends Model
{
    use HasFactory;

    protected $fillable = [
        'date',
        'opening_stock',
        'production',
        'sales',
        'closing_stock',
        'total_cash',
    ];
    

public function user()
{
    return $this->belongsTo(User::class);
}

}
