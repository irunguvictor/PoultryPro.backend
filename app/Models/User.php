<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Models\EggDetail;
use App\Models\Stock;
use App\Models\HealthLog;
use App\Models\SalesExpense;
use App\Models\Report;
use App\Models\Feed;


class User extends Authenticatable
{
    use HasApiTokens, Notifiable;
    use HasFactory;

    protected $fillable = [
        'name',
        'email',
        'password',
        
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    public function eggDetails()
    {
        return $this->hasMany(EggDetail::class);
    }

    public function stocks()
    {
        return $this->hasMany(Stocks::class);
    }

    public function healthLogs()
    {
        return $this->hasMany(HealthLog::class);
    }

    public function feeds()
    {
        return $this->hasMany(Feed::class);
    }
    public function salesExpenses()
    {
        return $this->hasMany(SalesExpense::class);
    }
    

    public function reports()
    {
        return $this->hasMany(Report::class);
    }

    
}
