<?php

namespace App\Http\Controllers\User;
use App\Http\Controllers\Controller;
use App\ImageClass\images;
use App\Models\Room;
use App\Models\Room_Reservation;
use App\Models\Image;
use Carbon\Carbon;
use DateTime;
use Illuminate\Http\Request;

class Room_Controller extends Controller
{

    
    public function details($id)
    {
        $room = Room::find($id);
        // $images = Image::where('room_id',$id)->get();
        // $images_url = [];
        // foreach ($images as $image) {
        //     array_push($images_url,$image->url);
        // }
        // $room->images = $images_url ;
        $room->increment('views');
        $room->save();
        return response()->json([
            'msg' => 'viewed'
        ],200);
    }

    public function calendar($id)
    {
        $reservations = Room_Reservation::where('room_id',$id)->get();
        
        $reserved_days = [];
        foreach ($reservations as $reservation) {
            $date = Carbon::createFromFormat('Y-m-d', "$reservation->start_date");
            $start = new DateTime($reservation->start_date) ;
            $end = new DateTime($reservation->end_date) ;
            $days= $start->diff($end)->format('%a');
            array_push($reserved_days, $date->toDateString());
            for ($i=0; $i <$days ; $i++) { 
                array_push($reserved_days, ($date=$date->addDays(1))->toDateString());
            }
        }
        return response()->json([
            'data' => $reserved_days
        ],200);
    }

   
}
