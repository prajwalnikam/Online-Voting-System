<?php

namespace App\Http\Controllers;

use App\Models\Election;
use App\Models\Candidate;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function dashboard()
    {
        $elections = Election::all();
        return view('admin.dashboard', compact('elections'));
    }

    public function createElection()
    {
        return view('admin.create_election');
    }

    public function storeElection(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'start_date' => 'required|date',
            'end_date' => 'required|date',
        ]);

        Election::create($request->all());
        return redirect('/admin/dashboard')->with('success', 'Election created successfully');
    }

    public function manageCandidates($id)
    {
        $election = Election::find($id);
        return view('admin.manage_candidates', compact('election'));
    }

    public function storeCandidate(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'party' => 'required',
        ]);

        Candidate::create([
            'election_id' => $id,
            'name' => $request->name,
            'party' => $request->party,
        ]);

        return redirect("/admin/elections/$id/candidates")->with('success', 'Candidate added successfully');
    }

    public function viewResults($id)
    {
        $election = Election::with('candidates')->find($id);
        return view('admin.results', compact('election'));
    }
}

