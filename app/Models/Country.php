<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Country extends Model
{
    use HasFactory;
    
    protected $guarded=[];

    protected $table = 'countries';

    public function tours(){
        return $this->hasMany(Tour::class);
    }
     public function continent(){
        return $this->belongsTo(Continent::class);
    }
    public function country_locations(){
        return $this->belongsTo(Country::class);
    }
}
