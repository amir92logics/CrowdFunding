<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    use HasFactory;

    public function location()
    {
        return $this->hasMany(Location::class);
    }


    public function property()
    {
        return $this->hasMany(Property::class);
    }
}
