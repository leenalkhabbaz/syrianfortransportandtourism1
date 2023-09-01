<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Beach extends Model
{
    use HasFactory;

    protected $table = "beaches";
    protected $primaryKey = "id";
    protected $fillable = [
        'name',
        'address',
        'description',
        'phone_number'
    ];
    public $timestamps = true;

    public function images() {
        return $this->hasMany(Image::class,'beach_id');
    }

    public function rooms() {
        return $this->hasMany(Room::class,'beach_id');
    }

    public function favorites() {
        return $this->hasMany(Favorite::class,'beach_id');
    }

    public function books()
    {
        return $this->hasMany(Room_Reservation::class,'beach_id');
    }

    public function locations()
    {
        return $this->hasMany(Location::class);
    }
}
