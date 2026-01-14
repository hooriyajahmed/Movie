<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\celebrity;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class CelebrityController extends Controller
{
    // form
    function celebritypage(){
        return view('Admin.celebrity');
    }

     public function insertcelebrity(Request $req)
    { $data = $req->validate([
            'name'   => 'required',
             'pic'    => 'required|image|mimes:jpeg,jpg,png,gif',
        ]);

        // Upload image
        $file = $req->file('pic')->store('celebrity', 'public');
        $path = basename($file);

        // Save celebrity
        celebrity::create([
            'name'    => $data['name'],
            'picture' => $path,
        ]);

        return redirect()->route('fetchcelebrity')->with('success', '1 Celebrity Inserted Successfully');
    }

    // Fetch all celebrity
    public function fetch()
    {
        $data = celebrity::all();
        return view('Admin.fetchcelebrity', compact('data'));
    }

    // Delete celebrity
    public function delete($id)
    {
        $celebrity = celebrity::findOrFail($id);

        $imgPath = storage_path('app/public/celebrity/' . $celebrity->picture);
        if (File::exists($imgPath)) {
            File::delete($imgPath);
        }

        $celebrity->delete();

        return redirect()->route('fetchcelebrity')->with('success', 'Celebrity Deleted');
    }

    // Edit celebrity form
    public function edit($id)
    {
        $data = celebrity::findOrFail($id);
        return view('Admin.editcelebrity', compact('data'));
    }

    // Update celebrity
    public function update(Request $req, $id)
    {
        $celebrity = celebrity::findOrFail($id);

        $celebrity->name   = $req->name;
       
        if ($req->hasFile('pic')) {
            $oldPath = storage_path('app/public/celebrity/' . $celebrity->picture);
            if (File::exists($oldPath)) 
                File::delete($oldPath);

            $file = $req->file('pic')->store('celebrity', 'public');
            $celebrity->picture = basename($file);
        }

        $celebrity->save();

        return redirect()->route('fetchcelebrity')->with('success', 'Celebrity Updated');
    }
}