<?php

namespace App\Http\Controllers\Dashboard;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Beach;
use App\Models\Room;
use App\ImageClass\images;
use App\Models\Room_Reservation;

class Rooms extends Controller
{

    public function createRoom(Request $request,$id)
    {
    $request->validate([
        'number' =>'required',
        'description' => 'required',
        'capacity' => 'required',
        'category' => 'required',
        'one_day_price' => 'required',
        'services' => 'required',
        'content' => 'required',
        'fileName'=>'required'
    ]);


    $room= new Room();
    $room->name=$request->input('number');
    $room->description=$request->input('description');
    $room->capacity=$request->input('capacity');
    $room->category=$request->input('category');
    $room->one_day_price=$request->input('one_day_price');
    $room->services=$request->input('services');
    $room->content=$request->input('content');
    if( $room->beach_id!=Null)
    {   $beach=Beach::find($id);
        $forign=$room->beach_id=$beach->id;
    }
    if( $room->beach_id!=Null)
    {
        $beach=Beach::find($id);
        $forign=$room->beach_id=$beach->id;
    }

    $room->save();
    $uni='rooms';
    images::uplodimage($request,$room->id,$uni);


   return response()->json('done');
    }
    public function Show_reservation($id)
    {
        $events = array();
        $bookings = Room_Reservation::where('room_id',$id)->get();
        foreach($bookings as $booking) {

            $events[] = [
               // 'id'   => $booking->id,
                'title' => $booking->user_name,
                'start' => $booking->start_date,
                'end' => $booking->end_date,

            ];
        }
       // dd($events);
        return view('Calander', ['events' => $events]);
    }

    public function showeditroomm($id)
{
    $room= Room::find($id);
    $room_content=$room->content;
    $room_services=$room->services;
    $room_capacity=$room->capacity;
    $room_one_day_price=$room->one_day_price;
    $room_category=$room->category;
    $room_description=$room->description;
    $room_number=$room->name;
    //العلاقات
    $room_images=$room->images;

     return view('Edit-room',['room'=> $room,'room_one_day_price'=>$room_one_day_price,'room_capacity'=>$room_capacity,'room_content'=>$room_content,'room_services'=>$room_services,'room_category'=>$room_category,'room_description'=>$room_description,'room_images'=>$room_images,'room_number'=>$room_number]);
}
public function editRoom(Request $request, $id)
{   $room= Room::find($id);
    $images=$room->images;
    if($request->fileName!=NULL)
    {
    foreach(    $images as     $image)
    {
        $image->room()->dissociate( $room);
        $image->save();
    }
    $uni='rooms';
    $idd=$room->id;
    images::uplodimage($request,$idd,$uni);
}

$room->name=$request->input('number');
$room->description=$request->input('description');
 $room->capacity=$request->input('capacity');
 $room->category=$request->input('category');
 $room->one_day_price=$request->input('one_day_price');
 $room->services=$request->input('services');
 $room->content=$request->input('content');
 $room->save();
 return back()->withInput();

}

public function deleteroom(Request $request,$id)
    {   $room= Room::find($id);
        $room->delete();
        return back()->withInput();
    }
    public function available(Request $request, $id)
{   $room= Room::find($id);
    $room->is_available=false;
    $room->save();
    return back()->withInput();

}
public function notavailable(Request $request, $id)
{   $room= Room::find($id);
    $room->is_available=true;
    $room->save();
    return back()->withInput();
}



}
