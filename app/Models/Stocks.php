<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Stocks extends Model
{
    use HasFactory;

    protected $fillable = [
        'date',
        'item_name',
        'quantity',
        'user_id',
    ];
    

public function user()
{
    return $this->belongsTo(User::class);
}

}
