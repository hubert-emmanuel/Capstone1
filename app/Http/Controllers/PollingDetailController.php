<?php

namespace App\Http\Controllers;

use App\Models\Kurikulum;
use App\Models\MataKuliah;
use App\Models\Polling;
use App\Models\PollingDetail;
use App\Models\User;
use Illuminate\Http\Request;

class PollingDetailController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('polling_detail.index',[
            'pds' => PollingDetail::all(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('polling_detail.create', [
            'ps' => Polling::all(),
            'users' => User::all(),
            'mks' => MataKuliah::all(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData  = validator($request->all(), [
            'id_polling_detail' => 'required|string|max:20',
        ])->validate();
        $data = $request->all();
        $pollingDetail = new PollingDetail($validatedData);
        $pollingDetail -> save();
        return redirect(route('polling-list'));
    }

    /**
     * Display the specified resource.
     */
    public function show(PollingDetail $pollingDetail)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(PollingDetail $pollingDetail)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, PollingDetail $pollingDetail)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(PollingDetail $pollingDetail)
    {
        //
    }
}
