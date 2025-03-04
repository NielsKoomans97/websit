<?php

namespace App\Http\Controllers;

use App\Models\Observation;
use Illuminate\Http\Request;

class ObservationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $observations = Observation::all();

        return view('content.observations.index', compact('observations'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
     public function show(Request $request){
        $observation = Observation::find($request->id);

        return view('content.observations.details.show', compact('observation'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Observation $observation)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Observation $observation)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Observation $observation)
    {
        //
    }
}
