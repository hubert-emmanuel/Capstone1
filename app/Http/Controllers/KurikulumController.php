<?php

namespace App\Http\Controllers;

use App\Models\Kurikulum;
use App\Models\MataKuliah;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class KurikulumController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('kurikulum.index',[
            'kks' => Kurikulum::all(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('kurikulum.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData  = validator($request->all(), [
            'id_kurikulum' => 'required|string|max:20',
            'tahun_ajaran' => 'required|string|max:100',
            'semester_aktif' => 'required|string|max:100'
        ])->validate();
        $data = $request->all();
        $kurikulum = new Kurikulum($validatedData);
        $kurikulum -> save();
        return redirect(route('kurikulum-list'));
    }

    /**
     * Display the specified resource.
     */
    public function show(Kurikulum $kurikulum)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Kurikulum $kurikulum)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Kurikulum $kurikulum)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Kurikulum $kurikulum)
    {
        if ($kurikulum->matakuliah()-> get() ->count() > 0) {
            Session::flash('msg', 'Data has been used');
        } else {
            $kurikulum->delete();
            Session::flash('msg', 'Data deleted successfully');
        }
        return redirect()->back();
    }
}
