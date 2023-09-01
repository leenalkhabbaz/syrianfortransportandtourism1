<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Path;
use App\Models\Sout;
use App\Models\Vote;
use Illuminate\Http\Request;

class Votes_Controller extends Controller
{
    public function all()
    {
        $votes = Vote::all();
        return response()->json([
            'status' => true ,
            'data' => $votes ,
        ],200);
    }

    public function vote_paths($id)
    {
        $paths = Path::where('vote_id',$id)->get();
        return response()->json([
            'status' => true ,
            'data' => $paths ,
        ],200);
    }

    public function vote($id)
    {
        $user = auth()->user() ;

        $path = Path::find($id) ;
        $already_voted = Sout::where('vote_id',$path->vote_id)->where('user_id',$user->id)->first();
        if($already_voted)
        {
            if($already_voted->sot == $id)
            {
                $already_voted->delete();
                return response()->json([
                    'msg' => "vote canceled" ,
                ],200);
            }
            else return response()->json([
                'msg' => "sorry you have already voted for another path" ,
            ],401);
        }
    
        $sout = new Sout();
        $sout->sot = $id ;
        $sout->vote_id = $path->vote_id ;
        $sout->user_id = $user->id;
        $sout->save() ;

        return response()->json([
            'msg' => "voted" ,
        ],200);
    }
}
