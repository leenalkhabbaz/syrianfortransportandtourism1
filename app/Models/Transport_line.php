<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transport_line extends Model
{
    use HasFactory;
    protected $table = "transport_lines";
    protected $primaryKey = "id";
    protected $fillable = [
        'start',
        'end',
    ];
    public $timestamps = true;

    public function tours() {
        return $this->hasMany(Transport_tour::class, 'line_id');
    }
    public function images()
    {
        return $this->hasMany(Image::class,'line_id');
    }

}
