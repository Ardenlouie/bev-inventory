<?php

namespace App\Http\Controllers;

use App\Models\Refreshable;
use App\Models\Department;
use Illuminate\Http\Request;

class RefreshableController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $refreshables = Refreshable::all();

        return view('refreshables.index')->with([
            'refreshables' => $refreshables,
        ]);
    }

    public function sodts($param1, $param2, $param3)
    {
        $results = Refreshable::callspSOREPORTALLBEVIDTS($param1, $param2, $param3);

        return response()->json($results);
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
    public function show($id)
    {
        $refreshables = Refreshable::where('id', $id)->get();
        foreach($refreshables as $refreshable){

        }

        return view('refreshables.show')->with([
            'refreshable' => $refreshable,

        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Refreshable $refreshable)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Refreshable $refreshable)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Refreshable $refreshable)
    {
        //
    }
}
