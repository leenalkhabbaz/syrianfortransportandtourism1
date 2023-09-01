<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Location extends Model
{
    use HasFactory;

    protected $fillable = [
        'longitude',
        'latitude'
    ];

    public function hotel() {
        return $this->belongsTo(Hotel::class, 'hotel_id');
    }

    public function beach() {
        return $this->belongsTo(Beach::class, 'beach_id');
    }
}
