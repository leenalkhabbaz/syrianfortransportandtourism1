<?php

namespace App\Http\Controllers\Dashboard;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Models\Beach;
use App\Models\Image;
use App\ImageClass\images;
use App\Models\Hotel;
use App\Models\Location;
use App\Models\Room;
use App\Models\Room_Reservation;
use Carbon\Carbon;
use App\CashClass\cash;

class HotelController extends Controller
{
    public function createHotel(Request $request)
    {
    //$temp = $request->all();
    $request->validate([
        'name' =>'required',
        'address' => 'required',
        'number_of_room' => 'required',
        'phone_number' => 'required',
       'description' => 'required',
        ]);


    $Hotel= new Hotel();

    $Hotel->name=$request->input('name');
    $Hotel->address=$request->input('address');
    $Hotel->description=$request->input('description');
    $Hotel->phone_number=$request->input('phone_number');
    $Hotel->number_of_room=$request->input('number_of_room');

    $Hotel->save();
    $uni='hotels';

   // images::uplodimage($request,$Beach->id,$uni);
  //  dd($request->all());
    if(!$request->hasFile('fileName')) {
        return response()->json(['upload_file_not_found'], 400);
    }

    $allowedfileExtension=['pdf','jpg','png','PNG','JPG','mp4','MP4'];
    $files = $request->file('fileName');

    $errors = [];
       foreach ($files as $file) {
        //dd($request->fileName);

        $extension = $file->getClientOriginalExtension();

        $check = in_array($extension,$allowedfileExtension);

        if($check) {
            foreach($request->fileName as $mediaFiles) {
             //   dd($request->fileName);
                $name = $mediaFiles->getClientOriginalName();
                $path = $mediaFiles->storeAs('',$name,'public');
                $image = new Image();
                $image->url= $path;
                if($uni=='hotels')
                {
                    $image->hotel_id=$Hotel->id;
                }

                $image->save();
            }
    }
}
$location = new Location();
$location->latitude = $request->lat;
$location->longitude = $request->lng;
$location->hotel_id = $Hotel->id;
$location->save();
cash::cash_hotel();

return redirect('/ShowAllHotel');

    }

   public function show_form_hotel(){
    return view('Add-hotel');
   }

 public function ShowAllHotel()
    {
        $hotels=cash::showhotelfromcash();
        $collection = collect($hotels);

        $multiplied = $collection->map(function ($hotels, $key) {
            $images=$hotels->images;
           return [$images];

        });
        $multiplied->all();
  return  view('ShowAllHotel',['hotels'=>$hotels]);

    }
    public function ShowInfoHotel($id)

    {
       $hotels= Hotel::find($id);
       $hotel_id= $hotels->id;
        return view('ShowInfoHotel',['hotels'=> $hotels]);
        }

 public function ShowSpecificHotel()
        {
            $hotels = Hotel::all();
            $collection = collect($hotels);
            $rooms = Room::all();
            $multiplied = $collection->map(function ($hotels, $key) {
                $images=$hotels->images;
                $rooms=$hotels->rooms;
               return [$images,$rooms];
            });
            $multiplied->all();
            $collection2 = collect($rooms);
            $multiplied2 = $collection2->map(function ($rooms, $key) {
                $images_room=$rooms->images;
                return [$images_room];
            });
            $multiplied2->all();
        return view('ui-tabs-accordions',['hotels'=> $hotels,'rooms'=>$rooms]);
        }

  public function createRoomHotel(Request $request,$id)
    {
        $request->validate([
            'number' =>'required',
            'description' => 'required',
            'capacity' => 'required',
            'category' => 'required',
            'one_day_price' => 'required',
            'services' => 'required',
            'content' => 'required',
           // 'fileName'=>'required',
        ]);
        $room= new Room();
        $room->name=$request->input('number');
       $room->description=$request->input('description');
        $room->capacity=$request->input('capacity');
        $room->category=$request->input('category');
        $room->one_day_price=$request->input('one_day_price');
        $room->services=$request->input('services');
        $room->content=$request->input('content');
        $hotel=Hotel::find($id);
        $room->hotel_id=$hotel->id;
        $room->save();
       $idd=$room->id;
        $uni='rooms';
       images::uplodimage($request,$idd,$uni);
      
   return redirect('ShowInfoHotel/'.$hotel->id);

    }
    public function ShowAddRoomHotel($id)
    {
        $hotels= Hotel::find($id);
        $hotel_id= $hotels->id;

         return view('Add-roomHotel',['hotels'=> $hotels]);
    }
    public function ShowInfoHotelEmp($id)

{
   $hotels= Hotel::find($id);
   $hotel_id= $hotels->id;

    return view('employee.ShowInfoHotelEmp',['hotels'=> $hotels]);
    }

    public function show_book_hotel($id)
    {
        $hotel=Hotel::find($id);
        $books=$hotel->books;
       // return  $beach->books;
        return  view('employee.Show-hotel-reservation',['books'=>$books]);
    }

    public function showallbookHotel()
    {
        $books=Room_Reservation::where('hotel_id', '<>', '')->orderBy('created_at', 'desc')->get();
        $collection = collect($books);

        $multiplied = $collection->map(function ($books, $key) {
            $hotel=$books->hotel;
           return [$hotel];

        });

        $multiplied->all();
        return  view('employee.Show-hotel-reservation',['books'=>$books]);
    }
    public function showedithotel($id)
{
   $hotel= Hotel::find($id);
   $hotel_name=$hotel->name;
   $hotel_number_of_room=$hotel->number_of_room;
   $hotel_phone_number=$hotel->phone_number;
   $hotel_address=$hotel->address;
   $hotel_description=$hotel->description;
    //العلاقات
   $hotel_images=$hotel->images;

     return view('Edit-Hotel',['hotel'=>$hotel,'hotel_phone_number'=>$hotel_phone_number,'hotel_name'=>$hotel_name,'hotel_number_of_room'=>$hotel_number_of_room,'hotel_address'=>$hotel_address,'hotel_description'=>$hotel_description,'hotel_images'=>$hotel_images]);
}
public function editHotel(Request $request, $id)
{   $hotel= Hotel::find($id);
    $images=$hotel->images;
    if($request->fileName!=NULL)
    {
    foreach($images as $image)
    {
        $image->hotel()->dissociate( $hotel);
        $image->save();
    }
    $uni='hotel';
    $idd=$hotel->id;
    images::uplodimage($request,$idd,$uni);
}

$hotel->name=$request->input('name');
$hotel->address=$request->input('address');
$hotel->description=$request->input('description');
$hotel->phone_number=$request->input('phone_number');
$hotel->number_of_room=$request->input('number_of_room');

$hotel->save();
return redirect('/ShowAllHotel');


}

function searchHotel(Request $request)
    {
        $output="";
$reservation=Room_Reservation::where('hotel_id', '<>', '')->where('user_name','Like','%'.$request->search.'%')->get();
foreach($reservation as $reservation){
    if($reservation->find($reservation->id)->confirmed){
    $output.=
    '<tr>
    <td> '.$reservation->user_name.'</td>
    <td> '.$reservation->user_phone.'</td>
    <td> '.$reservation->total_price.'</td>
    <td> '.$reservation->beach->name.'</td>
    <td> '.$reservation->room_name.'</td>
    <td> '.$reservation->start_date.'</td>
    <td> '.$reservation->end_date.'</td>
    <td> '.'
    <button type="submit" class="btn btn-success"disabled>'.'تم الدفع </button>
</td>'.'
<td> '.'
<a href="/reservationdelete/'.$reservation->id.'" class="btn btn-soft-danger" type="submit">'.'حذف
</a>
</td>'.'
    </tr>';
}
else{
    $output.=
    '<tr>
    <td> '.$reservation->user_name.'</td>
    <td> '.$reservation->user_phone.'</td>
    <td> '.$reservation->total_price.'</td>
    <td> '.$reservation->hotel->name.'</td>
    <td> '.$reservation->room_name.'</td>
    <td> '.$reservation->start_date.'</td>
    <td> '.$reservation->end_date.'</td>
    <td> '.'
<a href="/reservationaccepted/'.$reservation->id.'" class="btn btn-soft-dark" type="submit">'.'دفع
</a>
</td>'.'
<td> '.'
<a href="/reservationdelete/'.$reservation->id.'" class="btn btn-soft-danger" type="submit">'.'حذف
</a>
</td>'.'
    </tr>';
}
}
return response($output);
    }
    public function create_book_hotel(Request $request,$id)
    {      $room=Room::find($id);

        $book= new Room_Reservation();
        $book->user_name=$request->input('user_name');
        $book->user_phone=$request->input('user_phone');
        $book->persons_count=$request->input('persons_count');
        $book->start_date=$request->input('start_date');
        $book->end_date=$request->input('end_date');
        $start = Carbon::createFromFormat('Y-m-d', "$book->start_date");
        $end = Carbon::createFromFormat('Y-m-d', "$book->end_date");
        $start->toDateTimeString();
        $end->toDateTimeString();
        $days= $start->diff($end)->format('%a');
        $total_price=$days*$room->one_day_price;
   $book->total_price=$total_price;
      //  dd($total_price);
        $book->room_id=$room->id;
       // $book->confirmed=true;

        $book->hotel_id=$room->hotel_id;

        $book->room_name=$room->name;
        $book->save();
        // dd($room->hotel_id);
        // return back()->withInput();
        return redirect('/showallbookHotel');

    }
    public function ShowCreateBookH($id)

    {
       $room= Room::find($id);
       $room_id= $room->id;

        return view('employee.AddBookHotel',['room'=> $room]);
        }
}

