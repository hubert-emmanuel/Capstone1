<?php

namespace App\Http\Controllers;

use App\Models\Kurikulum;
use App\Models\Polling;
use Illuminate\Http\Request;

class PollingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('polling.index',[
            'ps' => Polling::all(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('polling.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData  = validator($request->all(), [
            'id_polling' => 'required|string|max:20',
        ])->validate();
        $data = $request->all();
        $polling = new Polling($validatedData);
        $polling -> save();
        return redirect(route('polling-list'));
    }

    /**
     * Display the specified resource.
     */
    public function show(Polling $polling)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Polling $polling)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Polling $polling)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Polling $polling)
    {
        //
    }
}
