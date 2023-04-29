<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FeaturedSubscription extends Model
{
    use HasFactory;

    public function FeaturedPlanSubscribe()
    {
        return $this->hasMany(User::class,'id','user_id');

    }
}
