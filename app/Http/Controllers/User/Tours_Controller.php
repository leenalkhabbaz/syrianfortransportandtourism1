<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Tour;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;

class Tours_Controller extends Controller
{
    public function all()
    {
        $tours = Tour::where('person_count', '>', 0)->get();
        $tours = collect($tours);
        $tours = $tours->map(function ($tour) {
            $tour_ = new Collection($tour);
            $images = collect($tour->images)->map(function ($image) {
                return $image->url;
            });
            $tour_['images'] = $images;
            return $tour_;
        });
        return response()->json([
            'data' => $tours,
        ], 200);
    }

    public function details($id)
    {
        $tour = Tour::find($id);
        $tour_ = new Collection($tour);
        $images = collect($tour->images)->map(function ($image) {
            return $image->url;
        });
        $tour_['images'] = $images;
        return response()->json([
            'data' => $tour_,
        ], 200);
    }
}
