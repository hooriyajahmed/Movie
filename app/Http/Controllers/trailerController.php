<?php

namespace App\Http\Controllers;

use App\Models\Movie;
use App\Models\Trailer;
use Illuminate\Http\Request;

class TrailerController extends Controller
{
    // Add trailer page
    public function index()
    {
        $movie = Movie::all();
        return view('Admin.addtrailer', compact('movie'));
    }

    // Insert trailer
    public function store(Request $request)
    {
        $request->validate([
            'movie_id' => 'required',
            'desc'     => 'required',
            'trailer'  => 'required|mimes:mp4,mkv,avi|max:51200',
        ]);

        // Video upload
        $videoName = time().'_trailer.'.$request->trailer->extension();
        $request->trailer->move(public_path('uploads/trailers'), $videoName);

        Trailer::create([
            'movie_id' => $request->movie_id,
            'desc'     => $request->desc,
            'video'    => $videoName,
        ]);

        return redirect()->route('fetchtrailer')->with('success', 'Trailer added successfully');
    }

    // Fetch trailer page
    public function fetch()
    {
        $trailers = Trailer::with('movie')->get();
        return view('Admin.fetchtrailer', compact('trailers'));
    }
    // Edit trailer form
public function edit($id)
{
    $trailer = Trailer::findOrFail($id);
    $movies  = Movie::all();

    return view('Admin.edittrailer', compact('trailer', 'movies'));
}

// Update trailer
public function update(Request $request, $id)
{
    $trailer = Trailer::findOrFail($id);

    $request->validate([
        'movie_id' => 'required',
        'desc'     => 'required',
        'trailer'  => 'nullable|mimes:mp4,mkv,avi|max:51200',
    ]);

    // agar new video upload ho
    if ($request->hasFile('trailer')) {

        // old video delete
        if (file_exists(public_path('uploads/trailers/'.$trailer->video))) {
            unlink(public_path('uploads/trailers/'.$trailer->video));
        }

        $videoName = time().'_trailer.'.$request->trailer->extension();
        $request->trailer->move(public_path('uploads/trailers'), $videoName);

        $trailer->video = $videoName;
    }

    $trailer->movie_id = $request->movie_id;
    $trailer->desc     = $request->desc;
    $trailer->save();

    return redirect()->route('fetchtrailer')->with('success', 'Trailer updated successfully');
}
public function delete($id)
{
    $trailer = Trailer::findOrFail($id);

    // Trailer video delete from folder
    $videoPath = public_path('uploads/trailers/'.$trailer->video);
    if (file_exists($videoPath)) {
        unlink($videoPath);
    }

    // Delete record from DB
    $trailer->delete();
    return back()->with('success', 'Trailer deleted successfully');
}

}
