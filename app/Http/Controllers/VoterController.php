<?php

namespace App\Http\Controllers;

use App\Models\Election;
use App\Models\Vote;
use Illuminate\Http\Request;


class VoterController extends Controller
{
    public function listElections()
    {
        $elections = Election::with('candidates')->where('end_date', '>=', now())->get();
        return view('voter.elections', compact('elections'));
    }

    public function vote(Request $request)
    {
        // Get the logged-in user from the session
        $user = session('user'); 
        if (!$user) {
            return redirect()->back()->with('error', 'You must be logged in to vote.');
        }
        
        // Validate the request
        try {
            $request->validate([
                // 'election_id' => 'required|exists:elections,id',
                'candidate_id' => 'required|exists:candidates,id',
            ]);
        } catch (\Illuminate\Validation\ValidationException $e) {
            dd($e->errors());
        }
        // dd($request);
    
        // Insert the vote
        $vote = new Vote();
        $vote->user_id = $user->id; // Ensure user_id is set
        $vote->election_id = $request->election_id;
        $vote->candidate_id = $request->candidate_id;
        $vote->save();
    
        return redirect()->route('dashboard')->with('success', 'Your vote has been recorded.');
    }
    

public function showElections()
{
    // Load elections with candidates
    $elections = Election::with('candidates')->get();

    return view('election', ['elections' => $elections]);
}

}

