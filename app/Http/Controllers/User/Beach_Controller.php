<?php

namespace App\Http\Controllers\User;
use App\Http\Controllers\Controller;
use App\ImageClass\images;
use App\Models\Beach;
use App\Models\Room;
use App\Models\Image;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

class Beach_Controller extends Controller
{
    public function show()
    {
        $beaches = Beach::all();
        $all = [] ;
        foreach ($beaches as $beach) {
            $images = Image::where('beach_id',$beach->id)->get();
            $images_url = [];
            foreach ($images as $image) {
            array_push($images_url,'storage/pic/'.$image->url);
            }
            $beach->images = $images_url;
            $show = collect($beach) ;
            $show['lat'] = $beach->locations[0]['latitude'];
            $show['lng'] = $beach->locations[0]['longitude'];
            array_push($all,$show);
        }
        Log::info(json_encode($all));
        return response()->json([
            'data' => $all
        ],200);
    }

    public function all_rooms($id)
    {
        $rooms = Room::where('beach_id',$id)->where('is_available',true)->get();
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
    //     $rooms = Room::where('beach_id',$id)->where('is_available',true)->whereBetween('one_day_price',[$start, $end])->get();
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
    //     $rooms = Room::where('beach_id',$id)->where('is_available',true)->where('category',$type)->get();
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
    //     $rooms = Room::where('beach_id',$id)->where('is_available',true)->where('capacity',$capacity)->get();
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

    public function filter_rooms(Request $request , $id)
    {
        
        $rooms = Room::where('beach_id',$id)->where('is_available',true);

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


    public function myfunction()
    {
        Artisan::call('optimize');
        return response()->json([
            'msg' => 'optimized successfully'
        ],200);
    }




    // public function rooms($id)
    // {
    //     $rooms = Room::where('beach_id',$id)->get();
    //     return response()->json([
    //         'data' => $rooms
    //     ],200);
    // }
}
