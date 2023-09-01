<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Room_Reservation;
use Illuminate\Http\Request;
use App\Models\Hotel;

class HotelCount extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $months = ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'];

        $data = [];
        $roomReservations = [];
        $hotels = Hotel::all();

        foreach ($hotels as $hotel) {
            $hotelData = [
                'hotelName' => $hotel->name,
                'chartData' => []
            ];

            for ($i = 1; $i <= 12; $i++) {
                $record = Room_Reservation::where('hotel_id', $hotel->id)
                    ->whereMonth('created_at', $i)
                    ->count();

                $monthData = [
                    'label' => $months[$i - 1],
                    'data' => $record
                ];

                $hotelData['chartData'][] = $monthData;
            }


            $data[$hotel->name] = $hotelData;

            $beachRoomReservations = Room_Reservation::select('room_id', 'room_name', \DB::raw('COUNT(*) as total'))
            ->where('hotel_id', $hotel->id)
            ->groupBy('room_id', 'room_name')
            ->orderByDesc('total')
            ->get();

            $roomReservations[$hotel->name] = $beachRoomReservations;
        }
        $books=Room_Reservation::where('hotel_id', '<>', '')->orderBy('created_at', 'desc')->take(10)->get();
        $collection = collect($books);

        $multiplied = $collection->map(function ($books, $key) {
            $hotel=$books->hotel;
           return [$hotel];

        });

        $multiplied->all();

        return view('HotelCount',['books'=>$books], compact('data','books', 'roomReservations'));
    }
}
