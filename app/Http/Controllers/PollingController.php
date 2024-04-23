<?php

namespace App\Http\Controllers;

use App\Models\Kurikulum;
use App\Models\MataKuliah;
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
            'tanggal_mulai_polling' => 'required|date',
            'tanggal_akhir_polling' => 'required|date',
        ])->validate();
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
        return view('polling.edit', [
            'p' => $polling,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Polling $polling)
    {
        $validatedData  = validator($request->all(), [
            'id_polling' => 'required|int',
            'tanggal_mulai_polling' => 'required|date',
            'tanggal_akhir_polling' => 'required|date',
        ])->validate();

        $polling->id_polling = $validatedData['id_polling'];
        $polling->tanggal_mulai_polling = $validatedData['tanggal_mulai_polling'];
        $polling->tanggal_akhir_polling = $validatedData['tanggal_akhir_polling'];
        $polling->update($validatedData);
        return redirect(route('polling-list-prodi'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Polling $polling)
    {
        $polling->delete();
        return redirect()->back();
    }
}
