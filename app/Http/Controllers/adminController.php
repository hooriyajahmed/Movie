<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Feedback;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

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
    public function editUser($id)
{
    $user = User::findOrFail($id);
    return view('Admin.editusers', compact('user'));
}

public function updateUser(Request $req, $id)
{
    $user = User::findOrFail($id);

    $req->validate([
        'name' => 'required',
        'email' => 'required|email|unique:users,email,' . $user->id,
        'password' => 'nullable|min:6',
    ]);

    $user->name = $req->name;
    $user->email = $req->email;

    // Password sirf tab update ho jab likhi ho
    if ($req->filled('password')) {
        $user->password = Hash::make($req->password);
    }

    $user->save();

    return redirect()->route('adminindex')->with('success', 'User Updated Successfully');
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
   public function feedbackList()
{
    $feedbacks = Feedback::with('user')->latest()->get();
    return view('admin.fatchfeedback', compact('feedbacks'));
}


public function deleteFeedback($id)
{
    $feedback = Feedback::findOrFail($id);
    $feedback->delete();

    return redirect()->back()->with('success', 'Feedback deleted successfully');
}
   
}
