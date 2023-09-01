<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Path extends Model
{
    use HasFactory;
    public function vote() {
        return $this->belongsTo(Vote::class,'vote_id');
    }
}
