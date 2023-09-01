<?php

namespace App\Http\Controllers\Dashboard;
use App\Models\Room_Reservation;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Beach;
use App\Models\Room;
use App\Models\Dayofbook;
use App\Models\Hotel;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB as FacadesDB;

class BookBeachController extends Controller
{



    public function showallbook()
    {
        $books=Room_Reservation::where('beach_id', '<>', '')->orderBy('created_at', 'desc')->get();
        $collection = collect($books);

        $multiplied = $collection->map(function ($books, $key) {
            $beach=$books->beach;
           return [$beach];

        });

        $multiplied->all();
        return  view('employee.Show-beach-resevration',['books'=>$books],compact('books'));
    }

    public function show_book_beach($id)
    {
        $beach=Beach::find($id);
        $books=$beach->books;
       // return  $beach->books;
        return  view('employee.Show-beach-resevration',['books'=>$books]);
    }



    public function fail_book($id)
    {  $book=Room_Reservation::find($id);
        $book->delete();

       return back()->withInput();
    }

    public function accept_book($id)
    {
        $book=Room_Reservation::findOrFail($id);
        $book=Room_Reservation::find($id);

        $book->confirmed=true;
        $book->save();
        //return  "done";
        return back()->withInput();
    }



    function searchBeach(Request $request)
    {
        $output="";
$reservation=Room_Reservation::where('beach_id', '<>', '')->where('user_name','Like','%'.$request->search.'%')->get();
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
    <td> '.$reservation->beach->name.'</td>
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

    public function create_book(Request $request,$id)
    {       $room=Room::find($id);

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

            $book->beach_id=$room->beach_id;
            $book->room_name=$room->name;
            $book->save();
            return redirect('/showallbook');

    }
    public function ShowCreateBook($id)

    {
       $room= Room::find($id);
       $room_id= $room->id;

        return view('employee.AddBook',['room'=> $room]);
        }

}
















