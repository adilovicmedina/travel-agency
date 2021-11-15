<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Location extends Model
{
    use HasFactory;
    protected $guarded=[];
    public function locations_country(){
        return $this->belongsTo(Country::class);
    }
    public function locations_tours(){
        return $this->hasMany(Tour::class);
    }
      public function locations_categories(){
        return $this->belongsToMany(Category::class, 'categories_locations', 'location_id', 'category_id');
    }
}
