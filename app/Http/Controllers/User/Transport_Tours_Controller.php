<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Transport_line;
use App\Models\Transport_tour;
use Illuminate\Http\Request;

class Transport_Tours_Controller extends Controller
{
    public function line_tours($id)
    {
        $tours = Transport_tour::where('line_id',$id)->where('number_chairs','>',0)->get();
        return response()->json([
            'data' => $tours
        ],200);
    }
}
