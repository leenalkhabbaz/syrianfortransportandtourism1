<?php

namespace App\Http\Controllers\User;
use App\Http\Controllers\Controller;
use App\Models\Hotel;
use App\Models\Image;
use App\Models\Room;
use Illuminate\Http\Request;

class Hotel_Controller extends Controller
{
    public function show()
    {
        $hotels = Hotel::all();
        $all = [] ;
        foreach ($hotels as $hotel) {
            $images = Image::where('hotel_id',$hotel->id)->get();
            $images_url = [];
            foreach ($images as $image) {
            array_push($images_url,'storage/pic/'.$image->url);
            }
            $hotel->images = $images_url;
            array_push($all,$hotel);
        }
        return response()->json([
            'data' => $all
        ],200);
    }

    public function all_rooms($id)
    {
        $rooms = Room::where('hotel_id',$id)->where('is_available',true)->get();
        $all_rooms = [] ;
        foreach ($rooms as $room) {
             $images = Image::where('room_id',$room->id)->get();
             $images_url = [];
             foreach ($images as $image) {
             array_push($images_url,'storage/pic/'.$image->url);
             }
             $room->images = $images_url ; 
             array_push($all_rooms,$room);
        }
        return response()->json([
            'data' => $all_rooms
        ],200);
    }

    public function filter_rooms(Request $request , $id)
    {
        
        $rooms = Room::where('hotel_id',$id)->where('is_available',true);

        $start = $request->start_price ;
        $end = $request->end_price ;
        $type = $request->type ;
        $capacity = $request->capacity ;

        if($start!=null)
        $rooms = $rooms->whereBetween('one_day_price',[$start, $end]);
        
        if($type!=null)
        $rooms = $rooms->where('category',$type);
            
        if($capacity!=null)
        $rooms = $rooms->where('capacity',$capacity);
       
        $rooms = $rooms->get();
        
        $all_rooms = [] ;
        foreach ($rooms as $room) {
             $images = Image::where('room_id',$room->id)->get();
             $images_url = [];
             foreach ($images as $image) {
             array_push($images_url,'storage/pic/'.$image->url);
             }
             $room->images = $images_url ; 
             array_push($all_rooms,$room);
        }
        return response()->json([
            'data' => $all_rooms
        ],200);
    }

    // public function filter_rooms_by_price_range(Request $request , $id)
    // {
    //     $start = $request->start_price ;
    //     $end = $request->end_price ;
    //     $rooms = Room::where('hotel_id',$id)->where('is_available',true)->whereBetween('one_day_price',[$start, $end])->get();
    //     $all_rooms = [] ;
    //     foreach ($rooms as $room) {
    //          $images = Image::where('room_id',$room->id)->get();
    //          $images_url = [];
    //          foreach ($images as $image) {
    //          array_push($images_url,'storage/pic/'.$image->url);
    //          }
    //          $room->images = $images_url ; 
    //          array_push($all_rooms,$room);
    //     }
    //     return response()->json([
    //         'data' => $all_rooms
    //     ],200);
    // }

    // public function filter_rooms_by_type(Request $request,$id)
    // {
    //     $type = $request->type ;
    //     $rooms = Room::where('hotel_id',$id)->where('is_available',true)->where('category',$type)->get();
    //     $all_rooms = [] ;
    //     foreach ($rooms as $room) {
    //          $images = Image::where('room_id',$room->id)->get();
    //          $images_url = [];
    //          foreach ($images as $image) {
    //          array_push($images_url,'storage/pic/'.$image->url);
    //          }
    //          $room->images = $images_url ; 
    //          array_push($all_rooms,$room);
    //     }
    //     return response()->json([
    //         'data' => $all_rooms
    //     ],200);
    // }

    // public function filter_rooms_by_capacity(Request $request,$id)
    // {
    //     $capacity = $request->capacity ;
    //     $rooms = Room::where('hotel_id',$id)->where('is_available',true)->where('capacity',$capacity)->get();
    //     $all_rooms = [] ;
    //     foreach ($rooms as $room) {
    //          $images = Image::where('room_id',$room->id)->get();
    //          $images_url = [];
    //          foreach ($images as $image) {
    //          array_push($images_url,'storage/pic/'.$image->url);
    //          }
    //          $room->images = $images_url ; 
    //          array_push($all_rooms,$room);
    //     }
    //     return response()->json([
    //         'data' => $all_rooms
    //     ],200);
    // }
}
