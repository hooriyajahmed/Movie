<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;



class profileController extends Controller
{
//   function insert(){
//         return view('User.profile');
//     }

      public function profile($id)
    {
        $data = auth::findOrFail($id);
        return view('User.profile', compact('data'));
    }
}