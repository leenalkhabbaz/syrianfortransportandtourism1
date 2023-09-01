<?php

namespace App\Http\Controllers\Dashboard;
use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Sout;
use App\Models\Vote;
use Illuminate\Http\Request;
use Redirect,Response;

use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class ChartJSController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {

//  $record = User::select(\DB::raw("COUNT(*) as count"), \DB::raw("DAYNAME(created_at) as day_name"), \DB::raw("DAY(created_at) as day"))
//     ->where('created_at', '<', Carbon::today()->subDay(6))
//     ->groupBy('day_name','day')
//     ->orderBy('day')
//     ->get();



 $record = Sout::select(\DB::raw("COUNT(*) as count"))
 ->where('vote_id',$id)
 ->orderBy('sot')

  ->groupBy('sot') ->get();



     $data = [];
     $vote=Vote::find($id);

     $path=$vote->paths;

     $collection = collect($path);
     $collection->toArray();

     $i=0;


     foreach ($record as $row) {
      if (isset($collection[$i])) {
          $data['label'][] = $collection[$i]->path;
      } else {
          // Handle the case when $collection[$i] does not exist
          $data['label'][] = 'N/A';
      }

      $data['data'][] = (int)$row->count;
      $i = $i + 1;
  }


    $data['chart_data'] = json_encode($data);

    return view('chart-jsVote', $data);
    }

}
