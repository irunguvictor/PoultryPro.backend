<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Feed extends Model {
    protected $fillable = [
      'date','chicken_count','per_chicken_kg','total_feed_kg','user_id'
    ];
    public function user() {
      return $this->belongsTo(User::class);
    }
  }
  