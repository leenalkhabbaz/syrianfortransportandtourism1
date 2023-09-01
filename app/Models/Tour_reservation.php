<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tour_reservation extends Model
{
    use HasFactory;
    protected $table = "tours_reservations";
    protected $primaryKey = "id";
    protected $fillable = [
        'user_id',
        'name',
        'number',
        'number_person',
        'total_price',
        'tour_id',
        'transport_tour_id',
    ];
    public $timestamps = true;

    public function transport_tour() {
        return $this->belongsTo(Transport_tour::class, 'trasnport_tour_id');
    }
}
