<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\ImageClass\images;
use App\Models\Ad;
use App\Models\Ads;
use App\Models\Path;
use App\Models\Tour;
use App\Models\Tour_reservation;
use App\Models\Vote;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Pagination\Pagination;
use Illuminate\Support\Collection;

class TripController extends Controller
{

    public function show_form_trip(){
    return view('employee.AddTrip');
   }
   public function show_trip(){
    return view('employee.trip');
   }

   public function createTripe(Request $request)
   {
   $request->validate([
       'title' =>'required',
       'person_count' => 'required',
       'tour_pro' => 'required',
       'price' => 'required',
       'date' => 'required',
       'starting_time' => 'required',
       'days_count' => 'required',
       'tour_place'=>'required',
       'starting_place'=>'required',
   ]);
   $tour= new Tour();
   $tour->title=$request->input('title');
  $tour->person_count=$request->input('person_count');
   $tour->tour_pro=$request->input('tour_pro');
   $tour->price=$request->input('price');
   $tour->date=$request->input('date');
   $tour->starting_time=$request->input('starting_time');
   $tour->days_count=$request->input('days_count');
   $tour->tour_place=$request->input('tour_place');
   $tour->starting_place=$request->input('starting_place');

   $tour->save();
  $idd=$tour->id;
   $uni='tours';
  images::uplodimage($request,$idd,$uni);

  return redirect('show_info_trip/'.$tour->id);

   }
   public function editTrip(Request $request,$id)
   {
   $request->validate([
    'title' =>'required',
    'person_count' => 'required',
    'tour_pro' => 'required',
    'price' => 'required',
    'date' => 'required',
    'starting_time' => 'required',
    'days_count' => 'required',
    'tour_place'=>'required',
    'starting_place'=>'required',
   ]);
   $tour=Tour::find($id);
   $images=$tour->images;
   if($request->fileName!=NULL)
   {
   foreach(    $images as     $image)
   {
       $image->tour()->dissociate($tour);
       $image->save();
   }
   $uni='tours';
   $idd=$tour->id;
   images::uplodimage($request,$idd,$uni);
}
   $tour->title=$request->input('title');
  $tour->person_count=$request->input('person_count');
   $tour->tour_pro=$request->input('tour_pro');
   $tour->price=$request->input('price');
   $tour->date=$request->input('date');
   $tour->starting_time=$request->input('starting_time');
   $tour->days_count=$request->input('days_count');
   $tour->tour_place=$request->input('tour_place');
   $tour->starting_place=$request->input('starting_place');
   $tour->save();
   return redirect('show_info_trip/'.$tour->id);
   }

   public function show_trips()
    {
        $tours = Tour::orderBy('created_at', 'desc')->get();
        $collection = collect($tours);

        $multiplied = $collection->map(function ($tours, $key) {
            $images=$tours->images;
           return [$images];

        });
        $multiplied->all();

  return  view('employee.ShowTrips',['tours'=>$tours]);

    }

   public function show_info_trip($id)
   {
    $tours= Tour::find($id);
    $tour_id= $tours->id;
    $book=$tours->reservations()->paginate(6);
  return view('employee.ShowInfoTrip',['tours'=> $tours,'book'=>$book]);


   }

   public function create_BookTrip(Request $request,$id)
   {       $tour=Tour::find($id);
           $book= new Tour_reservation();
           $book->name=$request->input('name');
           $book->number=$request->input('phone_number');
           $number_person= $book->number_person=$request->input('person_number');
           $book->total_price=$number_person*$tour->price;
           $book->tour_id=$tour->id;
           $book->save();
           return back()->withInput();
   }


   function searchTrip(Request $request)
   {

       $output="";
$reservation=Tour_reservation::where('name','Like','%'.$request->search.'%')->get();
foreach($reservation as $reservation){
   if($reservation->find($reservation->id)->confirmed){
   $output.=
   '<tr>
   <td> '.$reservation->name.'</td>
   <td> '.$reservation->number.'</td>
   <td> '.$reservation->number_person.'</td>
   <td> '.$reservation->total_price.'</td>

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
   <td> '.$reservation->name.'</td>
   <td> '.$reservation->number.'</td>
   <td> '.$reservation->number_person.'</td>
   <td> '.$reservation->total_price.'</td>

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

   public function delete_trip($id)
   {
       $tour=Tour::find($id);
       $tour->delete();
       return redirect('/show_trip');

   }
   public function show_EditTrip($id)
   {
       $tour=Tour::find($id);
       return view('employee.EditTrip',['tour'=> $tour]);
   }



   public function show_form_Ads(){
    $tours=Tour::all();
    return view('employee.Add_Ads',['tours'=>$tours]);
   }
   public function ShowAllADS(){
    $ads = Ad::all();
    $collection = collect($ads);
    $multiplied = $collection->map(function ($ads, $key) {
        $images=$ads->images;
       return [$images];

    });
    $multiplied->all();
    return view('employee.Show_Ads',['ads'=> $ads]);
   }

   public function CreateAds(Request $request){
    $request->validate([
        'title'=>'required',
        'description' =>'required',
        'phone_number' => 'nullable',
        'duration' => 'required',

    ]);
     $ads=new Ad();
    $ads->title=$request->input('title');
    $ads->description=$request->input('description');
  $ads->phone_number=$request->input('phone_number');
  $ads->duration=$request->input('duration');
    if($request->input('internal')!= null)
    {
      $ads->type=$request->input('internal');
    }
   else if($request->input('external')!= null)
    {

      $ads->type=$request->input('external');
    }
    $ads->tour()->associate($request->input('tour_id'));

   $ads->save();
   $uni='ads';
   $idd=$ads->id;
   images::uplodimage($request,$idd,$uni);
  return redirect('/ShowAllADS');
  //return back()->withInput();

}
public function show_EditAd($id)
{
    $ads=Ad::find($id);
    $tours=Tour::all();

    return view('employee.EditAds',['ads'=> $ads,'tours'=>$tours]);
}
public function EditAds(Request $request,$id){
    $request->validate([
        'title'=>'required',
        'description' =>'required',
        'phone_number' => 'nullable',
        'duration' => 'required',

    ]);
    $ads=Ad::find($id);
     $images=$ads->images;
     if($request->fileName!=NULL)
     {
     foreach(    $images as     $image)
     {
         $image->ad()->dissociate($ads);
         $image->save();
     }
     $uni='ads';
     $idd=$ads->id;
     images::uplodimage($request,$idd,$uni);
  }
    $ads->title=$request->input('title');
    $ads->description=$request->input('description');
  $ads->phone_number=$request->input('phone_number');
  $ads->duration=$request->input('duration');
    if($request->input('internal')!= null)
    {
      $ads->type=$request->input('internal');
    }
   else if($request->input('external')!= null)
    {

      $ads->type=$request->input('external');
    }
    $ads->tour()->associate($request->input('tour_id'));

   $ads->save();

  return redirect('/ShowAllADS');
//return back()->withInput();

}

public function show_info_Ad($id)
   {
    $ads= Ad::find($id);
    $ad_id= $ads->id;
  return view('employee.Show_info_ad',['ads'=> $ads]);
   }
   public function delete_Ad($id)
   {
       $ads=Ad::find($id);
       $ads->delete();
       return redirect('/ShowAllADS');

   }
   public function show_form_vote(){
    return view('employee.Add_vote');
   }

   public function CreateVote(Request $request){
    $vote=new Vote();
    $vote->name=$request->input('name');
    $vote->description=$request->input('description');
    $vote->save();

     for ($i=0;$i<count($request->input('path')); $i++){
        $pa=new Path();
        $pa->vote()->associate($vote);
        $pa->path=$request->path[$i];
        $pa->save();

    }

    return redirect('/ShowVotes');
   }
public function ShowVotes(){

    $votes=Vote::orderBy('created_at', 'desc')->get();
    $collection = collect($votes);
    $multiplied = $collection->map(function ($votes, $key) {
        $paths=$votes->paths;
       return [$paths];

    });
    $multiplied->all();
    // dd($votes);
      return view('employee.ShowVote',['votes'=>$votes]);
}
public function DeleteVote($id){
    $vote=Vote::find($id);
    $vote->delete();
   return ;
}

public function show_form_Updatevote($id){
    $vote=Vote::find($id);
    return view('employee.Edit_vote',['vote'=> $vote]);
   }
public function UpdateVote(Request $request, $id)
{
    $vote = Vote::find($id);
    $vote->name = $request->input('name');
    $vote->description = $request->input('description');
    // حذف جميع المسارات القديمة المرتبطة بالتصويت
    $vote->paths()->delete();

    // إضافة المسارات الجديدة المرتبطة بالتصويت
    for ($i = 0; $i < count($request->input('path')); $i++) {
        $pa = new Path();
        $pa->vote()->associate($vote);
        $pa->path = $request->path[$i];
        $pa->save();
    }
    $vote->save();
    // return redirect()->back()->with('success', 'تم تحديث التصويت بنجاح');
    return redirect('/ShowVotes');
}



}

