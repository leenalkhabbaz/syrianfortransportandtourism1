<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Items;
use App\Models\Recommended_Item;
use App\Models\Room_Reservation;
use App\Models\Tour_reservation;
use App\Models\Transport_Reservation;
use App\Models\Transport_tour;
use App\Models\User;
use Illuminate\Http\Request;

class Recommendation_Controller extends Controller
{
    public function show_recommendations()
    {
        $user = User::find(auth()->id());

        $user_items = Items::where('user_id',$user->id)->get()->pluck('name');

        $beach_reservation = Room_Reservation::where('user_id', $user->id)->where('hotel_id', null)->first();
        $hotel_reservation = Room_Reservation::where('user_id', $user->id)->where('beach_id', null)->first();
        $tourism_tours_reservation = Tour_reservation::where('user_id', $user->id)->where('transport_tour_id', null)->first();
        $transport_tours_reservation = Tour_reservation::where('user_id', $user->id)->where('tour_id', null)->first();

        $recommended_items = [];
        
        if (isset($beach_reservation)) {
            $recommend = Recommended_Item::where('category', 'beach')->get()->pluck('name') ;
            $new_items = array_values(array_diff($recommend->toArray(),$user_items->toArray()));
            $recommended_items = array_merge($recommended_items ,array_values(array_diff($new_items,$recommended_items))) ;
        }
        if (isset($hotel_reservation)) {
            $recommend = Recommended_Item::where('category', 'hotel')->get()->pluck('name') ;
            $new_items = array_values(array_diff($recommend->toArray(),$user_items->toArray()));
            $recommended_items = array_merge($recommended_items ,array_values(array_diff($new_items,$recommended_items))) ;
        }
        if (isset($tourism_tours_reservation)) {
            $recommend = Recommended_Item::where('category', 'tourism')->get()->pluck('name') ;
            $new_items = array_values(array_diff($recommend->toArray(),$user_items->toArray()));
            $recommended_items = array_merge($recommended_items , array_values(array_diff($new_items,$recommended_items))) ;
        }
        if (isset($transport_tours_reservation)) {
            $recommend = Recommended_Item::where('category', 'transport')->get()->pluck('name') ;
            $new_items = array_values(array_diff($recommend->toArray(),$user_items->toArray()));
            $recommended_items = array_merge($recommended_items ,array_values(array_diff($new_items,$recommended_items))) ;
        }
        
        if (sizeof($recommended_items) == 0) {
            return response()->json([
                'notes' => [
                    "مرحباً بك $user->name ",
                    "يمكنني ان أقترح لك بعض الأشياء التي يمكنك أخذها معك في رحلاتك وحجوزاتك معنا !",
                    "سارع ببدء تجربتك واحجز غرفتك او رحلتك حتى اتمكن من مساعدتك"
                ],
                'items' => $recommended_items ,
                'user_items' => $user_items ,
            ],200);
        }

        return response()->json([
            'notes' => [
                "مرحباً بك $user->name ",
                "بعض الأشياء التي قد تحتاجها :",
            ],
            'items' => $recommended_items ,
            'user_items' => $user_items ,
        ],200);
    }

    public function save_items(Request $request)
    {
        $user = User::find(auth()->id());

        $recommendation_items = Recommended_Item::all()->pluck('name');
        $user_items = Items::where('user_id',$user->id)->get()->pluck('name');

        $items = json_decode($request->items);
        $items = collect($items) ;
        $items = $items->map(function($item) use($recommendation_items,$user_items,$user){
            if(!in_array($item,$recommendation_items->toArray()))
            {
                Recommended_Item::create([
                    'name' => $item ,
                ]);
            }
            if(!in_array($item,$user_items->toArray()))
            {
                Items::create([
                    'name' => $item ,
                    'user_id' => $user->id ,
                ]);
            }
            return ;
        });

        return response()->json([
            'msg' => "done"
        ],200);

    }

    public function clear_my_items()
    {
        $user = User::find(auth()->id());
        $user->items->delete() ; 
        return response()->json([
            'msg' => "deleted" ,
        ],200);
    }

    public function delete_items(Request $request)
    {
        $items = json_decode($request->items) ;
        foreach ($items as $item) {
            Items::where('name',$item)->delete();
        }
        return response()->json([
            'msg' => "deleted" ,
        ],200);
    }
}
