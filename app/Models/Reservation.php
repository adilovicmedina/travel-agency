<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function tours()
    {
        return $this->belongsToMany(Tour::class);
    }

    public function users()
    {
        return $this->belongsTo(User::class, 'id');
    }
}
