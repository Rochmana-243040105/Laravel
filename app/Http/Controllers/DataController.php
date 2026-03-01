<?php

namespace App\Http\Controllers;

use App\Models\data;
use Illuminate\Http\Request;

class DataController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = data::all();
        return view('Data.index', compact('data'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama'=>'required|min:3',
            'nim'=>'required|min:3',
            'program_studi'=>'required'
        ]);
        data::create($validated);
        return redirect()->route('data.index')->with('success', 'Data berhasil ditambahkan!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
         $data = data::all();
         $dataDetail = data::findOrFail($id);
        return view('Data.index', compact('data', 'dataDetail'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
         $validated = $request->validate([
            'nama'=>'required|min:3',
            'nim'=>'required|min:3',
            'program_studi'=>'required'
        ]);
        data::where('id', $id)->update($validated);
        return redirect()->route('data.index')->with('success', 'Data berhasil diubah!');
    }

   
    public function destroy(string $id)
    {
        $dataDetail = data::findOrFail($id);
        $dataDetail->delete();
        return redirect()->route('data.index')->with('success', 'Data berhasil dihapus!');
    }
}
