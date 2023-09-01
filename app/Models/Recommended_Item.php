<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Recommended_Item extends Model
{
    use HasFactory;
    protected $table = "recommended_items";
    protected $primaryKey = "id";
    protected $fillable = [
        'name' ,
        'category' ,
    ];
}
