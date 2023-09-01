<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transport_Reservation extends Model
{
    use HasFactory;

    public function tour_street()
    {
        return $this->belongsTo(Tour_Street::class,'tour_id');
    }
    // public function line()
    // {
    //     return $this->belongsTo(Line::class,'line_id');
    // }
}
