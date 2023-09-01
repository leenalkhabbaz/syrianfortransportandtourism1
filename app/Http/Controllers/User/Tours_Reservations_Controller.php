<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Tour_reservation;
use App\Models\Transport_tour;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

class Tours_Reservations_Controller extends Controller
{

    public function reserve(Request $request)
    {
        $rules = [
            'transport_tour_id' => ['required',Rule::exists('transport_tours','id')],
            'name' =>['required','string'],
            'number' => ['required','numeric'],
            'number_person' => ['required','integer'],
        ];

        $input = [
            'transport_tour_id' => $request->tour_id,
            'name' =>$request->name,
            'number' =>$request->number,
            'number_person' => $request->number_person,
        ];

        $validator = Validator::make($input,$rules);

        if($validator->fails())
        {
            return response()->json([
                'msg' => $validator->errors()->all()[0]
            ],401);
        }

        $tour = Transport_tour::find($request['tour_id']);

        if($tour->number_chairs<$request->number_person || $tour->number_chairs==0)
        {
            return response()->json([
                'msg' => "عذراً لا يوجد أماكن متاحة"
            ],401);
        }

        $input['total_price']= ($request->number_person)*$tour->ticket_price ;

        $input['user_id'] = auth()->user()->id ;
        Tour_reservation::create($input);
        
        $tour->number_chairs = $tour->number_chairs - $request->number_person ;
        $tour->save();

        return response()->json([
            'msg' => "reserved successfully :)",
        ],200);

    }

    public function my_reservations()
    {
        $id = auth()->user()->id ;
        $reservations = Tour_reservation::where('user_id',$id)->where('transport_tour_id','!=',null)->get();
        return response()->json([
            'data' => $reservations
        ],200);
    }

    public function delete_reservation($id)
    {
        $reserve = Tour_reservation::find($id);
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
