<?php

namespace App\Http\Controllers;

use App\Models\Movie;
use App\Models\category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class MovieController extends Controller
{
    // Show insert form
    public function insert()
    {
        $cat=category::all();
        return view('Admin.movieinsert',compact('cat'));
    }

    // Store movie
    public function insertmovie(Request $req)
    {
        $data = $req->validate([
            'name'   => 'required',
            'amount' => 'required',
            'desc'   => 'required',
            'cat_id'   => 'required',
            'seats'  => 'required|integer|min:0',
             'pic'    => 'required|image|mimes:jpeg,jpg,png,gif',
        ]);

        // Upload image
        $file = $req->file('pic')->store('movie', 'public');
        $path = basename($file);

        // Save movie
        Movie::create([
            'name'    => $data['name'],
            'amount'  => $data['amount'],
            'desc'    => $data['desc'],
            'seats'   => $data['seats'],
            'cat_id'   => $data['cat_id'],
            'picture' => $path,
        ]);

        return redirect()->route('fetchmovie')->with('success', '1 Movie Inserted Successfully');
    }

    // Fetch all movies
    public function fetch()
    {
        $data = Movie::all();
        return view('Admin.fetchmovie', compact('data'));
    }

    // Delete movie
    public function delete($id)
    {
        $movie = Movie::findOrFail($id);

        $imgPath = storage_path('app/public/movie/' . $movie->picture);
        if (File::exists($imgPath)) {
            File::delete($imgPath);
        }

        $movie->delete();

        return redirect()->route('fetchmovie')->with('success', 'Movie Deleted');
    }

    // Edit movie form
    public function edit($id)
    {
        $data = Movie::findOrFail($id);
        return view('Admin.editmovie', compact('data'));
    }

    // Update movie
    public function update(Request $req, $id)
    {
        $movie = Movie::findOrFail($id);

        $movie->name   = $req->name;
        $movie->amount = $req->amount;
        $movie->desc   = $req->desc;
        $movie->seats  = $req->seats;

        if ($req->hasFile('pic')) {
            $oldPath = storage_path('app/public/movie/' . $movie->picture);
            if (File::exists($oldPath)) 
                File::delete($oldPath);

            $file = $req->file('pic')->store('movie', 'public');
            $movie->picture = basename($file);
        }

        $movie->save();

        return redirect()->route('fetchmovie')->with('success', 'Movie Updated');
    }
}