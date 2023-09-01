<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tour extends Model
{
    use HasFactory;
    protected $fillable = [
        'title',
        'person_count',
        'tour_pro',
        'price',
        'date',
        'starting_time',
        'days_count',
        'tour_place',
        'starting_place',
    ];
    public function reservations() 
    {
        return $this->hasMany(Tour_reservation::class, 'tour_id');
    }
    public function images()
    {
        return $this->hasMany(Image::class);
    }
    public function ads()
    {
        return $this->hasMany(Ad::class);
    }
}
