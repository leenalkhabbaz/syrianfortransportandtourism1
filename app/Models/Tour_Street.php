<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tour_Street extends Model
{
    use HasFactory;

    public function line()
    {
     return $this->belongsTo(Line::class,'line_id');
    }
    public function book()
    {
        return $this->hasMany(Reservation_line_street::class);
    }

}
