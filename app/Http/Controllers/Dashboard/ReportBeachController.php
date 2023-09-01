<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Room_Reservation;
use Illuminate\Http\Request;
use App\Models\Beach;
use App\Models\Room;
use Illuminate\Support\Facades\DB;

class ReportBeachController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $months = ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'];

        $data = [];
        $roomReservations = [];

        $beaches = Beach::all();

        foreach ($beaches as $beach) {
            $beachData = [
                'beachName' => $beach->name,
                'chartData' => []
            ];

            for ($i = 1; $i <= 12; $i++) {
                $record = Room_Reservation::where('beach_id', $beach->id)
                    ->whereMonth('created_at', $i)
                    ->count();

                $monthData = [
                    'label' => $months[$i - 1],
                    'data' => $record
                ];

                $beachData['chartData'][] = $monthData;
            }

            $data[$beach->name] = $beachData;

            $beachRoomReservations = Room_Reservation::select('room_id', 'room_name', \DB::raw('COUNT(*) as total'))
    ->where('beach_id', $beach->id)
    ->groupBy('room_id', 'room_name')
    ->orderByDesc('total')
    ->get();

            $roomReservations[$beach->name] = $beachRoomReservations;
        }
        $books=Room_Reservation::where('beach_id', '<>', '')->orderBy('created_at', 'desc')->take(10)->get();
        $collection = collect($books);

        $multiplied = $collection->map(function ($books, $key) {
            $beach=$books->beach;
           return [$beach];

        });


        return view('chart-js', ['books' => $books], compact('data', 'roomReservations'));

    }


    public function countroom()
    {
        $months = ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'];

        $data = [];

        $rooms = Room::all();

        foreach ($rooms as $room) {
            $roomData = [
                'roomName' => $room->name,
                'chartData' => []
            ];

            for ($i = 1; $i <= 12; $i++) {
                $record = Room_Reservation::where('room_id', $room->id)
                    ->whereMonth('created_at', $i)
                    ->count();

                $monthData = [
                    'label' => $months[$i - 1],
                    'data' => $record
                ];

                $roomData['chartData'][] = $monthData;
            }

            $data[] = $roomData;
        }
// dd($data);
        return view('roomreport', compact('data'));
    }

}
