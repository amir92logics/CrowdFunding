<?php

namespace App\Models;

use PDO;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Property extends Model
{
    use HasFactory;

    public function city()
    {
        return $this->belongsTo(City::class, 'city_id');
    }

    public function location()
    {
        return $this->belongsTo(Location::class, 'location_id');
    }
    public function propertyType()
    {
        return $this->belongsTo(PropertyType::class,'property_type');
    }



    public function propertyInfo()
    {
        return $this->hasOne(PropertyInfo::class,'property_id');
    }

    public function propertyImage()
    {
        return $this->hasMany(PropertyImage::class,'property_id');

    }

    public function featuredPlan()
    {
        return $this->hasMany(FeaturedSubscription::class,'property_id');

    }


    public function statusBadge($status){
        $html = '';
        if($this->status == 1){
            $html = '<span class="badge badge--success">'.trans('Active').'</span>';
        }else{
            $html = '<span class="badge badge--warning">'.trans('Inactive').'</span>';
        }

        return $html;
    }



}
