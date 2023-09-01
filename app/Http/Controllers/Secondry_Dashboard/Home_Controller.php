<?php

namespace App\Http\Controllers\Secondry_Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Beach;
use App\Models\Hotel;
use App\Models\Room;
use App\Models\User;
use Illuminate\Contracts\Validation\Validator as ValidationValidator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class Home_Controller extends Controller
{
    public function login2()
    {
      return view('auth.login2');
    }

    public function home()
    {
      if(Auth::user())
      {
        $user = User::find(Auth::user()->id);
        $hotel_id = $user->hotel_id ;
        if($hotel_id)
        {
          $hotel = Hotel::find($hotel_id) ;
          $rooms = $hotel->rooms ;
          $reservations = [] ;
        }
        else if($user->beach_id)
        {
          $beach_id = $user->beach_id ;
          $hotel = Beach::find($beach_id) ;
          $rooms = $hotel->rooms ;
          $reservations = [] ;
        }
        else return view('auth.login2');

        return view('secondery_dashboard.home',['hotel' => $hotel , 'rooms' => $rooms  ,'reservations' => $reservations]);
      }
      else return view('auth.login2');
    }

    public function reservations()
    {
      if(Auth::user())
      {
        $hotel = Hotel::all()->first() ;
        $user = User::find(Auth::user()->id);
        $hotel_id = $user->hotel_id ;
        if($hotel_id)
        {
          $hotel = Hotel::find($hotel_id) ;
        }
        else if($user->beach_id)
        {
          $beach_id = $user->beach_id ;
          $hotel = Beach::find($beach_id) ;
        }
        else return view('auth.login2');

        $reservations = $hotel->books ;
        return view('secondery_dashboard.reservations',['hotel' => $hotel ,'reservations' => $reservations]);
      }
      else return view('auth.login2');
    }

    public function room_reservations($id)
    {
     if(Auth::user())
       {
         $user = User::find(Auth::user()->id);
         $hotel_id = $user->hotel_id ;
         if($hotel_id)
         {
           $hotel = Hotel::find($hotel_id) ;
         }
         else if($user->beach_id)
         {
           $beach_id = $user->beach_id ;
           $hotel = Beach::find($beach_id) ;
         }        
         else return view('auth.login2');

         $room = Room::find($id);
         $rooms = $hotel->rooms ;
         $reservations = $room->reservations ;
         return view('secondery_dashboard.home',['hotel' => $hotel , 'rooms' => $rooms ,'reservations' => $reservations , 'room_name' => $room->name]);
       }
       else return view('auth.login2');
    }

     public function login(Request $request)
     {
        $input['email'] = $request->email ;
        $input['password'] = $request->password ;

        $rules = [
            'email' => ['required','email','exists:users'],
            'password' => ['required','string'],
        ];

        $validator = Validator::make($input,$rules);

        if($validator->fails())
        {
            return redirect("/secondry_dashboard/login2")->withErrors($validator->errors()->all());
        }

        $info = request(['email', 'password']);
       
        if (Auth::attempt($info)) {
            return redirect()->intended('secondry_dashboard')
                        ->withSuccess("login succesffully");
        }
  
        return redirect("/secondry_dashboard/login2")->withErrors('incorrect email or passwod');
    }
}
