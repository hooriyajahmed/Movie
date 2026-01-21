<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\category;
use App\Models\Celebrity;
use App\Models\Movie;
use App\Models\Trailer;

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


}