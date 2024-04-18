<?php

namespace App\Http\Controllers;

use App\Models\Kurikulum;
use App\Models\MataKuliah;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class MataKuliahController extends Controller
{
    /**
     * Display a listing of the resource.
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\MataKuliah $matakuliah
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Http\Response|\Illuminate\Routing\Redirector
     */
    public function index()
    {
        return view('matakuliah.index',[
            'mks' => MataKuliah::all(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('matakuliah.create', [
            'kks' => Kurikulum::all(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData  = validator($request->all(), [
            'id_mata_kuliah' => 'required|string|max:20',
            'nama_mata_kuliah' => 'required|string|max:100',
            'program_studi' => 'required|string|max:100',
            'kurikulum_id_kurikulum' => 'required|string|max:100',
            'foto' => 'mimes:jpeg,png|max:2048',
        ])->validate();
        $path = $request->file('foto')->store('foto_matakuliah', 'public');
        $mataKuliah = new MataKuliah($validatedData);
        $mataKuliah->foto = $path;
        $mataKuliah -> save();
        return redirect(route('matakuliah-list'));
    }

    /**
     * Display the specified resource.
     */
    public function show(MataKuliah $mataKuliah)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(MataKuliah $mataKuliah)
    {
        return view('matakuliah.edit', [
            'mk' => $mataKuliah,
            'kks' => Kurikulum::all(),
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, MataKuliah $mataKuliah)
    {
        $validatedData  = validator($request->all(), [
            'id_mata_kuliah' => 'required|string|max:20',
            'nama_mata_kuliah' => 'required|string|max:100',
            'program_studi' => 'required|string|max:100',
            'kurikulum_id_kurikulum' => 'required|string|max:100',
        ])->validate();
        $mataKuliah->id_mata_kuliah = $validatedData['id_mata_kuliah'];
        $mataKuliah->nama_mata_kuliah = $validatedData['nama_mata_kuliah'];
        $mataKuliah->program_studi = $validatedData['program_studi'];
        $mataKuliah->kurikulum_id_kurikulum = $validatedData['kurikulum_id_kurikulum'];
        $mataKuliah->update($validatedData);
        return redirect(route('matakuliah-list'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(MataKuliah $matakuliah)
    {

        $matakuliah->delete();
        return redirect()->back();
    }
}
