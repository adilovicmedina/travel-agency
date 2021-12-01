<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tour extends Model
{
    use HasFactory;

    protected $guarded = [];
    public function country()
    {
        return $this->belongsTo(Country::class, 'country_id');
    }
    public function location()
    {
        return $this->belongsTo(Location::class, 'location_id');
    }

}
