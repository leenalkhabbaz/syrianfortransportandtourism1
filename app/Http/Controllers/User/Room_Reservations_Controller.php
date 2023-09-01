<?php

namespace App\Http\Controllers\User;
use App\Http\Controllers\Controller;
use App\Models\Room;
use App\Models\Room_Reservation;
use Carbon\Carbon;
use DateTime;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

class Room_Reservations_Controller extends Controller
{

    
    public function reserve(Request $request , $id)
    {

        $rules = [
            'user_id' => ['required',Rule::exists('users','id')],
            'room_id' => ['required',Rule::exists('rooms','id')],
            'user_name' =>['required'],
            'user_phone' => ['required'],
            'persons_count' => ['required'],
            'start_date' => ['required'],
            'end_date' => ['required'],
        ];

        $input = [
            'user_id' => auth()->user()->id ,
            'room_id' =>$id,
            'user_name' =>$request->user_name,
            'user_phone' => $request->user_phone,
            'persons_count' => $request->persons_count,
            'start_date' => $request->start_date,
            'end_date' =>  $request->end_date,
        ];

        $validator = Validator::make($input,$rules);

        if($validator->fails())
        {
            return response()->json([
                'msg' => $validator->errors()->all()[0]
            ],400);
        }

        if(($input['start_date']>$input['end_date']))
        {
            return response()->json([
                'msg' =>"invalid date"
            ],401);
        }

        $room = Room::find($id);
    
        if(($input['persons_count']>$room->capacity))
        {
            return response()->json([
                'msg' =>"sorry you can't reserve this room :("
            ],401);
        }

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

        $new = [];
        $start1 = new DateTime($request->start_date) ;
        $end1 = new DateTime($request->end_date) ;
        $days1= $start1->diff($end1)->format('%a');
        $date1 = Carbon::createFromFormat('Y-m-d', "$request->start_date");
        array_push($new, $date1->toDateString());
        for ($i=0; $i <$days1 ; $i++) { 
            array_push($new, ($date1=$date1->addDays(1))->toDateString());
        }
        if(array_intersect($reserved_days,$new))
        {
            return response()->json([
                'msg' =>"sorry you can't reserve this room :("
            ],401);
        }
        
        $input['confirmed'] = 0 ;
        $input['total_price'] = $room->one_day_price * $days1  ;
        $input['room_name'] = $room->name ;
        $input['beach_id'] = $room->beach_id ;
        $input['hotel_id'] = $room->hotel_id ;

        $reserve = Room_Reservation::create($input);
        
        $room->increment('booking_counter');
        $room->save();

        return response()->json([
            'msg' => "reserved successfully :)",
            'data' =>  $reserve
        ],200);

    }

    public function my_reservations()
    {
        $id = auth()->user()->id ;
        $reservations = Room_Reservation::where('user_id',$id)->get();
        return response()->json([
            'data' => $reservations
        ],200);
    }

    public function delete_reservation($id)
    {
        $reserve = Room_Reservation::find($id);
        if($reserve->user_id != auth()->user()->id)
        return response()->json([
            'msg' => "invalid operation"
        ],401);

        $reserve->delete();

        return response()->json([
            'msg' => "deleted successfully"
        ],200);
    }
}
