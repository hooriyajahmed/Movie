<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class adminController extends Controller
{
    function adminindex()
    {
        return view('Admin.index');
    }
    function alluser()
    {
        $user = User::all();

        return view('Admin.allusers', ['alluser' => $user]);
    }
    function deleteuser($id)
   {
      $result = User::destroy($id);
      if ($result) {
         return redirect()->route('alluser')->with("success", "User Data is Deleted");
      } else {
         return redirect()->route('alluser');
      }
   }
   
}
