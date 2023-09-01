<?php

namespace App\Http\Controllers\Dashboard;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\ImageClass\image;
use App\Models\Beach;
use App\Models\Role;
use App\Models\Account;
use App\Models\Permission;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;
use App\ImageClass\images;
use App\Models\Hotel;
use App\Models\Recommended_Item;
use Illuminate\Support\Facades\Hash;

class createUser extends Controller
{

    public function toto()
    {   $roles=Role::all();
        $hotels=Hotel::all();
        $beachs=Beach::all();

        return view('Add-employee',['roles'=>$roles,'hotels'=>$hotels,'beachs'=>$beachs]);

    }
    public function showaddrole()
    { $items = Recommended_Item::where('category', 'is not approved')->get();
        return view('AddRules',['items'=>$items]);
    }


    public function approveitem(Request $request)
    {
        $items = Recommended_Item::where('category', 'is not approved')->get();


    foreach ($items as $item ) {
        $selectedValues = $request->input('purpose_' . $item->id);

        foreach($selectedValues as $selectedValue   )
        {
            $iteme=new Recommended_Item();
            $iteme->name= $item->name;
            $iteme->category=$selectedValue;
            $iteme->save();
        }

        $item->delete();

    }
    return redirect('/showaddrole')->with('status', '.......تم اضافة العناصر بنجاح');


}
public function createaccount(Request $request)
{
    $password = $request->input('password');
    $hashedPassword = Hash::make($password);

     $user=new User();
     $user->name=$request->input('name');
     $user->email=$request->input('email');
     $role=$request->input('adminType');

     $user->password=$hashedPassword;
     $user->save();
     $user->attachRole($role);

     if($request->adminType==='employee2')
     {
        if($request->adminRole=='role1')
    {
        $user->beach_id=$request->input('beach');
        $user->save();
    }
    else
    {   $user->hotel_id=$request->input('hotel');
        $user->save();

    }
    }


    return redirect('/showEmployee');



}

    public function logout()
    {

    Auth::logout();
    return view('signout');

    }



}
