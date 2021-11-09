<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
    use HasFactory;

    protected $fillable=['name', 'continent', 'photo'];
    public function tours(){
        return $this->hasMany(Tour::class);
    }
     public function continent(){
        return $this->belongsTo(Continent::class);
    }

}
