<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\category;
use App\Models\Movie;

class userController extends Controller
{
    function userindex()
    {
        return view('User.index');
    }


    function fatchcategory(){
    $cat=category::all();
return view('User.category',compact('cat'));

}

function moviecategory($id){
    $catmovie= Movie::where('cat_id', $id)->get();;
    return view('User.movie',compact('catmovie'));
}



}