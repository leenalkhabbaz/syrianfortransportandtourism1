<?php

namespace App\Http\Controllers\Dashboard;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Account;
use App\Models\Role;

class HomeController extends Controller

{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
         $user=Auth::user();
         if($user->hasRole('admin'))
         {
            return view('Add-Beach');
         }
         $accounts=Account::all();

         $collections = collect($accounts);
         $collections->toArray();
         foreach($collections as  $collection )
         {
             if ($user->email==$collection->email)
             {  $toto=Auth::user();


              // $toto->attachRole('employee1');
                return view('loggedInEmployee');
             }
         }
         $user->delete();
         return view('no_login');

         }




    }

