<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
    use HasFactory;

    protected $table = "rooms";
    protected $primaryKey = "id";
    protected $fillable = [
        'hotel_id',
        'beach_id',
        'name',
        'capacity',
        'description',
        'is_available',//محجوزة او لاء
        'category',
        'one_day_price',//سعر الاجار ليوم واحد
        'views',
        'services',
        'content',
        'booking_counter',//عداد يزيد كل مرة بتنحجز فيه الغرفة
    ];
    public $timestamps = true;

    public function images() {
        return $this->hasMany(Image::class);
    }

    public function favorites() {
        return $this->hasMany(Favorite::class);
    }

    public function reservations() {
        return $this->hasMany(Room_Reservation::class,'room_id');
    }

    public function hotel() {
        return $this->belongsTo(Hotel::class,'hotel_id');
    }

    public function beach() {
        return $this->belongsTo(Beach::class,'beach_id');
    }

    public function users()
    {
        return $this->belongsToMany(User::class ,'book_beaches','room_id','user_id');
    }
    

}
