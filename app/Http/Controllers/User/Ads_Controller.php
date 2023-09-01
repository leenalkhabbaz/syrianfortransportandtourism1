<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Ads;
use App\Models\Ad;

use Illuminate\Http\Request;

class Ads_Controller extends Controller
{
    public function all()
    {
        $ads = Ad::all() ;
        return response()->json([
            'data'=> $ads ,
        ],200);
    }
}
