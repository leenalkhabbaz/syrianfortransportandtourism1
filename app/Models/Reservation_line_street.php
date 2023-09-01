<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reservation_line_street extends Model
{
    use HasFactory;
    public function tour()
    {
     return $this->belongsTo(Tour_Street::class,'tour__street_id');
    }
}
