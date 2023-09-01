<?php

namespace App\Http\Controllers\Dashboard;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Transport_line;
use App\Models\Transport_tour;
use App\Models\Reservation_line_street;
use App\Models\Tour_reservation;

use Illuminate\Pagination\Pagination;
use Illuminate\Support\Collection;



class TransportController extends Controller
{
    public function show_info_Transtrip($id){
        $lines=Transport_line::find($id);
        $tour_streets=$lines->tours()->orderBy('created_at', 'desc')->paginate(6);
        return view('ShowTransTrip',['lines'=>$lines,'tour_streets'=> $tour_streets]);

       }
       public function create_book(Request $request,$id)
       {       $tour=Transport_tour::find($id);
               $book= new Tour_reservation();
               $book->name=$request->input('name');
               $book->number=$request->input('phone_number');
               $number_person= $book->number_person=$request->input('person_number');
               $book->total_price=$number_person*$tour->ticket_price;
               $book->transport_tour_id=$tour->id;
               $book->save();
               return redirect('show_reservation_tour/'.$tour->id);

       }
       public function showaddbookline($id)
       {
        $tour=Transport_tour::find($id);
         return view('employee.LineAddBook',['tour'=>$tour]);
       }
       public function show_form_trans_trip($id){
        $line= Transport_line::find($id);
        $line_id= $line->id;
        return view('employee.AddTransTrip',['line'=> $line]);
       }
    public function createTransTrip(Request $request,$id)
    {
    $request->validate([
        'number_chairs' =>'required',
        'date' => 'required',
        'time' => 'required',
        'ticket_price' => 'required',

    ]);
    $line= Transport_line::find($id);
    $tour= new Transport_tour();
    $tour->number_chairs=$request->input('number_chairs');
    $tour->date=$request->input('date');
    $tour->time=$request->input('time');
    $tour->ticket_price=$request->input('ticket_price');
    $tour->line_id=$line->id;


    $tour->save();



    return redirect('show_info_Transtrip/'.$tour->line_id);
    }
    public function show_form_edit_trans_trip($id)
    {
        $tour=Transport_tour::find($id);
        return view('employee.EditTransTrip',['tour'=> $tour]);
    }
    public function editTransTrip(Request $request,$id)
    {
    $request->validate([
        'number_chairs' =>'required',
        'date' => 'required',
        'time' => 'required',
        'ticket_price' => 'required',

    ]);
    $tour=Transport_tour::find($id);

    $tour->number_chairs=$request->input('number_chairs');
    $tour->date=$request->input('date');
    $tour->time=$request->input('time');
    $tour->ticket_price=$request->input('ticket_price');
    $tour->save();


    return redirect('show_info_Transtrip/'.$tour->line_id);
    }
    public function delete_trans_trip($id)
    {
        $tour=Transport_tour::find($id);
        $tour->delete();

        return back()->withInput();


    }
    public function show_reservation_tour($id)
    {
            $tour=Transport_tour::find($id);
                 $books=$tour->reservations()->orderBy('created_at', 'desc')->get();
                 return view('employee.Show-transTrip-reservation',['books'=>$books]);
    }
    function searchTripTrans(Request $request)
       {
           $output="";
   $reservation=Tour_reservation::where('name','Like','%'.$request->search.'%')->get();
   foreach($reservation as $reservation){
       if($reservation->find($reservation->id)->confirmed){
       $output.=
       '<tr>
       <td> '.$reservation->name.'</td>
       <td> '.$reservation->number.'</td>
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

    public function fail_book($id)
    {

        $book=Tour_reservation::find($id);
        $book->delete();
        return back()->withInput();
    }

    public function accept_book($id)
    {
        $book=Tour_reservation::findOrFail($id);
        $book=Tour_reservation::find($id);

        $book->confirmed=true;
        $book->save();
        //return  "done";
        return back()->withInput();
    }
}


