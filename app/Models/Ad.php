<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ad extends Model
{
    use HasFactory;
    protected $table = "ads";
    protected $primaryKey = "id";
    protected $fillable = [
        'title',
        'description',
        'phone_number',
        'type',// internal || external
        'duration'
    ];


    public function images()
    {
        return $this->hasMany(Image::class , 'ad_id');

    }
    public function tour() {
        return $this->belongsTo(Tour::class, 'tour_id');
    }
}
