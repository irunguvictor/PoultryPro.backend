<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EggDetail extends Model
{
    use HasFactory;

    protected $fillable = [
        'date',
        'egg_price',
        'opening_stock',
        'production',
        'sales',
        'closing_stock',
        'revenue',
        'user_id',
    ];
    
    

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
