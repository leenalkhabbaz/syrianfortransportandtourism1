<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    use HasFactory;

    protected $table = "images";
    protected $primaryKey = "id";
    protected $fillable = [
        'url',
        'hotel_id',
        'beach_id',
        'room_id',
        'tour_id',
        'place_id',
    ];
    public $timestamps = true;

    public function hotel() {
        return $this->belongsTo(Hotel::class, 'hotel_id');
    }

    public function beach() {
        return $this->belongsTo(Beach::class, 'beach_id');
    }

    public function room() {
        return $this->belongsTo(Room::class, 'room_id');
    }

    public function tour() {
        return $this->belongsTo(Tour::class, 'tour_id');
    }

    public function place() {
        return $this->belongsTo(Place::class, 'place_id');
    }
    public function line() {
        return $this->belongsTo(Transport_line::class, 'line_id');
    }
    public function ad() {
        return $this->belongsTo(Ad::class, 'ad_id');
    }
}
