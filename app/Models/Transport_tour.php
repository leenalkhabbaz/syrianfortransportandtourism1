<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transport_tour extends Model
{
    use HasFactory;
    protected $table = "transport_tours";
    protected $primaryKey = "id";
    protected $fillable = [
        'line_id',
        'number_chairs',
        'date',
        'time',
        'ticket_price',
    ];
    public $timestamps = true;

    public function line() {
        return $this->belongsTo(Transport_line::class, 'line_id');
    }

    public function reservations() {
        return $this->hasMany(Tour_reservation::class, 'transport_tour_id');
    }
}
