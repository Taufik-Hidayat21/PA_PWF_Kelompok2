<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Kamar;

class KamarController extends Controller
{
    /**
     * Display a listing of the rooms.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $kamars = Kamar::all();
        return view('admin.kamar.index', compact('kamars'));
    }

    /**
     * Show the form for creating a new room.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.kamar.create');
    }

    /**
     * Store a newly created room in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'no_kamar' => 'required|unique:kamars',
            'kapasitas' => 'required|integer',
            'harga' => 'required|numeric',
            'status' => 'required|in:available,occupied,under_maintenance',
        ]);

        $kamar = new Kamar();
        $kamar->no_kamar = $request->no_kamar;
        $kamar->kapasitas = $request->kapasitas;
        $kamar->harga = $request->harga;
        $kamar->status = $request->status;
        $kamar->save();

        return redirect()->route('admin.kamar.index')->with('success', 'Room created successfully.');
    }

    /**
     * Show the form for editing the specified room.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $kamar = Kamar::findOrFail($id);
        return view('admin.kamar.edit', compact('kamar'));
    }

    /**
     * Update the specified room in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'no_kamar' => 'required|unique:kamars,no_kamar,' . $id,
            'kapasitas' => 'required|integer',
            'harga' => 'required|numeric',
            'status' => 'required|in:available,occupied,under_maintenance',
        ]);

        $kamar = Kamar::findOrFail($id);
        $kamar->no_kamar = $request->no_kamar;
        $kamar->kapasitas = $request->kapasitas;
        $kamar->harga = $request->harga;
        $kamar->status = $request->status;
        $kamar->save();

        return redirect()->route('admin.kamar.index')->with('success', 'Room updated successfully.');
    }

    /**
     * Remove the specified room from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $kamar = Kamar::findOrFail($id);
        $kamar->delete();

        return redirect()->route('admin.kamar.index')->with('success', 'Room deleted successfully.');
    }
}