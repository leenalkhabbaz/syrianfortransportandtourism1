<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class AdminController extends Controller
{
    public function showEmployee()
    {
       $employees= User::all();

   
    return view('showemployee',['employees'=>$employees]);

    }
    public function delete_employee($id)
    {
       $employees= User::find($id);
       $employees->delete();


   
       return redirect('/showEmployee');

    }
    public function edit_employee($id)
    {
      $employee=User::find($id);
      return view('editEmployee',['employee'=>$employee]);

    }
    public function editEmployee(Request $request,$id)
    {
      $employee=User::find($id);
      $employee->name = $request->input('name');
      $employee->email = $request->input('email');
      $employee->save();

      return redirect('/showEmployee');

    }
}
