<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Inquiry extends Model
{
    use HasFactory;

    public function replies(){

        return $this->belongsTo(InquiryReply::class);
    }


    public function property()
    {
        return $this->belongsTo(Property::class);

    }

}
