<?php

namespace App\Http\Controllers\Dashboard;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Beach;
use App\Models\Image;
use App\ImageClass\images;
use App\Models\Location;
use App\Models\Room;
use Illuminate\Support\Facades\Storage;
use App\CashClass\cash;

class Beaches extends Controller
{
    public function createBeach(Request $request)
    {
    //$temp = $request->all();
    $request->validate([
        'name' =>'required',
        'address' => 'required',
        'number_of_room' => 'required',
        'phone_number' => 'required',
       'description' => 'required',
        ]);


    $Beach= new Beach();

    $Beach->name=$request->input('name');
    $Beach->address=$request->input('address');
    $Beach->description=$request->input('description');
    $Beach->phone_number=$request->input('phone_number');
    $Beach->number_of_room=$request->input('number_of_room');

    $Beach->save();
    $uni='beaches';

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
                //$name = $mediaFiles->getClientOriginalName();
                $path = Storage::disk('public')->put('',$mediaFiles);
                //$path = $mediaFiles->storeAs('',$name,'public');
                $image = new Image();
                $image->url= $path;
                if($uni=='beaches')
                {
                    $image->beach_id=$Beach->id;
                }
                if($uni=='rooms')
                {
                    $image->room_id=$Beach->id;
                }

                $image->save();
            }

            $location = new Location();
$location->latitude = $request->lat;
$location->longitude = $request->lng;
$location->beach_id = $Beach->id;
$location->save();
cash::cash();
            return redirect('/ShowAllBeach');
    }
}
return response()->json('done');


    }
    public function ShowAllBeach()
    {
        $beachs=cash::showfromcash();
        $collection = collect($beachs);

        $multiplied = $collection->map(function ($beachs, $key) {
            $images=$beachs->images;
           return [$images];

        });
        $multiplied->all();

        //$images=$beachs->images;
       // $name=$beachs->name;
       //dd($beachs);
    // return response()->json(['beachs' => $beachs,

    //             ]);
  return  view('extended-swiperslider',['beachs'=>$beachs]);

    }
    public function ShowSpecificBeach()
    {
        $beachs = Beach::all();
        $collection = collect($beachs);
        $rooms = Room::all();

        $multiplied = $collection->map(function ($beachs, $key) {
            $images=$beachs->images;
            $rooms=$beachs->rooms;
           return [$images,$rooms];
        });
        $multiplied->all();
        $collection2 = collect($rooms);
        $multiplied2 = $collection2->map(function ($rooms, $key) {
            $images_room=$rooms->images;
            return [$images_room];
        });
        $multiplied2->all();
        //dd($beachs);
        //  return response()->json(['beachs' => $beachs,'rooms'=>$rooms

        //         ]);
                return view('ui-tabs-accordions',['beachs'=> $beachs,'rooms'=>$rooms]);
  //return  view('ui-tabs-accordions');

    }
    public function showcreateroom($id)

{
   $beachs= Beach::find($id);
   $beach_id= $beachs->id;
  //return view('ui-tabs-accordions',['beach_id' => $beach_id]);
    return view('ui-tabs-accordions',['beachs'=> $beachs]);
    }



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
    $beach=Beach::find($id);
    $room->beach_id=$beach->id;
    $room->save();
   $idd=$room->id;
    $uni='rooms';
   images::uplodimage($request,$idd,$uni);
   //return response()->json('done');
//    return back()->withInput();
return redirect('showview/'.$beach->id);

    }

    public function showaddroom($id)
{
    $beachs= Beach::find($id);
    $beach_id= $beachs->id;

     return view('Add-room',['beachs'=> $beachs]);
}
public function show_add_beach()
{
    return view('Add-Beach');
}


public function ShowInfoBeachEmp($id)

{
   $beachs= Beach::find($id);
   $beach_id= $beachs->id;
  //return view('ui-tabs-accordions',['beach_id' => $beach_id]);
    return view('employee.ShowInfoBeachEmp',['beachs'=> $beachs]);
    }
    public function showeditroom($id)
    {
        $beach= Beach::find($id);
        $beach_name=$beach->name;
        $beach_number_of_room=$beach->number_of_room;
        $beach_phone_number=$beach->phone_number;
        $beach_address=$beach->address;
        $beach_description=$beach->description;
        //العلاقات
        $beach_images=$beach->images;

         return view('Edit-beach',['beach'=> $beach,'beach_phone_number'=>$beach_phone_number,'beach_name'=>$beach_name,'beach_number_of_room'=>$beach_number_of_room,
         'beach_address'=>$beach_address,'beach_description'=>$beach_description,
         'beach_images'=>$beach_images]);
    }

    public function editBeach(Request $request, $id)
{   $beach= Beach::find($id);
    $images=$beach->images;
    if($request->fileName!=NULL)
    {
    foreach(    $images as     $image)
    {
        $image->beach()->dissociate( $beach);
        $image->save();
    }
    $uni='beaches';
    $idd=$beach->id;
    images::uplodimage($request,$idd,$uni);
}

$beach->name=$request->input('name');
$beach->address=$request->input('address');
$beach->description=$request->input('description');
$beach->phone_number=$request->input('phone_number');
$beach->number_of_room=$request->input('number_of_room');

$beach->save();
return redirect('showview/'.$beach->id);

}
public function map()
    {
        return view('map');
   }
}

