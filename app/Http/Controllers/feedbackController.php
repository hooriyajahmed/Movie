<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Feedback;


class FeedbackController extends Controller
{
    public function create()
    {
        return view('user.formfeedback');
    }

  
    

public function storeFeedback(Request $request)
{
    Feedback::create([
        'user_id' => auth()->id(),
        'message' => $request->message,
    ]);

    return redirect()->back()->with('success', 'Feedback sent successfully');
}

}