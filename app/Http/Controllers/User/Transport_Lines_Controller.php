<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Transport_line;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;

class Transport_Lines_Controller extends Controller
{
    public function show()
    {
        $lines = Transport_line::all();
        $lines = collect($lines) ;
        $lines = $lines->map(function($line){
            $line_ = new Collection($line) ;
            $images = collect($line->images)->map(function($image){
                return $image->url ;
            });
            $line_['images'] = $images ;
            return $line_ ;
        });
        return response()->json([
            'data' => $lines ,
        ],200);
    }

    public function search(Request $request)
    {
        $lines = Transport_line::where('start','LIKE' ,"%$request->search%")->orWhere('end','LIKE' , "%$request->search%")->get();
        $lines = collect($lines) ;
        $lines = $lines->map(function($line){
            $line_ = new Collection($line) ;
            $images = collect($line->images)->map(function($image){
                return $image->url ;
            });
            $line_['images'] = $images ;
            return $line_ ;
        });
        return response()->json([
            'data' => $lines ,
        ],200);
    }

}
