<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Hotel extends Model
{
    use HasFactory;
    protected $table = "hotels";
    protected $primaryKey = "id";
    protected $fillable = [
        'name',
        'address',
        'description'
    ];
    public $timestamps = true;

    public function images() {
        return $this->hasMany(Image::class,'hotel_id');
    }

    public function rooms() {
        return $this->hasMany(Room::class,'hotel_id');
    }

    public function favorites() {
        return $this->hasMany(Favorite::class,'hotel_id');
    }

    public function books()
    {
         return $this->hasMany(Room_Reservation::class,'hotel_id');
    }
    public function locations()
{
    return $this->hasMany(Location::class);

}
}
