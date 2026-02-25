<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Quiz extends Model
{
    function category(){
        return $this->belongsTo(Category::class);
    }
      public function results()
    {
        return $this->hasMany(Result::class);
    }

    public function resultForUser($userId)
    {
        return $this->hasOne(Result::class)->where('user_id', $userId);
    }
}
