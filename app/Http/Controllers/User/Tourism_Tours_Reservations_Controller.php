<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Tour;
use App\Models\Tour_reservation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule ;

class Tourism_Tours_Reservations_Controller extends Controller
{
    public function reserve(Request $request)
    {
        
        $rules = [
            'tour_id' => ['required',Rule::exists('tours','id')],
            'name' =>['required','string'],
            'number' => ['required','numeric'],
            'number_person' => ['required','integer'],
        ];

        $input = [
            'tour_id' => $request->tour_id,
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

        $tour = Tour::find($request['tour_id']);

        if($tour->person_count<$request->number_person || $tour->person_count==0)
        {
            return response()->json([
                'msg' => "عذراً لا يوجد أماكن متاحة"
            ],401);
        }

        $input['total_price']= ($request->number_person)*$tour->price ;

        $input['user_id'] = auth()->user()->id ;
        Tour_reservation::create($input);
        
        $tour->person_count = $tour->person_count - $request->number_person ;
        $tour->save();

        return response()->json([
            'msg' => "reserved successfully :)",
        ],200);

    }

    public function my_reservations()
    {
        $id = auth()->user()->id ;
        $reservations = Tour_reservation::where('user_id',$id)->where('tour_id','!=',null)->get();
        return response()->json([
            'status' => true ,
            'data' => $reservations
        ],200);
    }

    public function delete_reservation($id)
    {
        $reserve = Tour_reservation::find($id);
        if($reserve->user_id != auth()->user()->id)
        return response()->json([
            'status'  => false ,
            'msg' => "invalid operation"
        ],200);

        $reserve->delete();

        return response()->json([
            'status' => true ,
            'msg' => "deleted successfully"
        ],200);
    }
}
