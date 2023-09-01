<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Room_Reservation extends Model
{
    use HasFactory;

    protected $table = "room__reservations";
    protected $primaryKey = "id";
    protected $fillable = [
        'user_id',
        'beach_id',
        'hotel_id',
        'room_id',
        'user_name',
        'user_phone',
        'room_name',
        'persons_count',
        'start_date',
        'end_date',
        'confirmed',
        'total_price',
    ];
    public $timestamps = true;

    public function user() {
        return $this->belongsTo(User::class,'user_id');
    }

    public function room() {
        return $this->belongsTo(Room::class,'room_id');
    }
    
    public function beach()
    {
        return $this->belongsTo(Beach::class,'beach_id');
    }

    public function hotel()
    {
        return $this->belongsTo(Hotel::class,'hotel_id');
    }



}
