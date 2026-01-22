<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\category;
use App\Models\Celebrity;
use App\Models\Movie;
use App\Models\Trailer;
use Illuminate\Support\Facades\Auth;

class userController extends Controller
{
    function userindex()
{
    $allmovie = Movie::all();
    $trailers = Trailer::with('movie')->latest()->get();

    return view('User.index', compact('allmovie', 'trailers'));
}
    function fatchcategory(){
    $cat=category::all();
return view('User.category',compact('cat'));

}

function moviecategory($id){
    $catmovie= Movie::where('cat_id', $id)->get();;
    return view('User.movie',compact('catmovie'));
}
public function celebrityname()
    {
        $celebrity=Celebrity::all();
        return view('User.celebrityname',compact('celebrity'));
    }
    public function blogdetail()
    {
        return view('User.blogs');
    }



    public function movieall(){
        $allmovie=Movie::all();
        return view('User.allmovie',compact('allmovie'));
    }

public function profile()
    {
        $user = Auth::user(); 
        return view('user.profile', compact('user'));
    }

    public function editProfile()
    {
        $user = Auth::user();
        return view('user.profile', compact('user'));
    }

    /* Update profile logic */
    public function profileUpdate(Request $req)
    {
        $user = Auth::user();

        $req->validate([
            'name'  => 'required',
            'email' => 'required',
            'passsword' => 'required',
            
        ]);

       
        /* Data update */
        $user->name  = $req->name;
        $user->email = $req->email;
        $user->password = $req->password;
        $user->save();

        return redirect()->route('user.profile')
        ->with('success', 'Profile updated successfully');
    }
}