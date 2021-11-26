<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    protected $guarded = [];
    public function categories_locations()
    {
        return $this->belongsToMany(Location::class, 'categories_locations', 'category_id', 'location_id');
    }
}
