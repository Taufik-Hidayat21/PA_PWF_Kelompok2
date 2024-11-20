<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Fasilitas;

class FasilitasController extends Controller
{
    /**
     * Display a listing of the facilities.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $facilities = Fasilitas::all();
        return view('admin.fasilitas.index', compact('facilities'));
    }

    /**
     * Show the form for creating a new facility.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.fasilitas.create');
    }

    /**
     * Store a newly created facility in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama' => 'required',
            'deskripsi' => 'required',
            'gambar' => 'required|image|max:2048',
        ]);

        $facility = new Fasilitas();
        $facility->nama = $request->nama;
        $facility->deskripsi = $request->deskripsi;
        $facility->gambar = $request->file('gambar')->store('fasilitas', 'public');
        $facility->save();

        return redirect()->route('admin.fasilitas.index')->with('success', 'Facility created successfully.');
    }

    /**
     * Show the form for editing the specified facility.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $facility = Fasilitas::findOrFail($id);
        return view('admin.fasilitas.edit', compact('facility'));
    }

    /**
     * Update the specified facility in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'name' => 'required',  // Sesuaikan dengan nama field di form
            'description' => 'required',
            'image' => 'nullable|image|max:2048',
        ]);

        $facility = Fasilitas::findOrFail($id);
        $facility->nama = $request->name;  // Mapping ke field database yang benar
        $facility->deskripsi = $request->description;
        
        if ($request->hasFile('image')) {
            // Gunakan nama folder yang konsisten
            $facility->gambar = $request->file('image')->store('fasilitas', 'public');
        }
        
        $facility->save();
        return redirect()->route('admin.fasilitas.index')
            ->with('success', 'Facility updated successfully.');
    }
    /**
     * Remove the specified facility from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $facility = Fasilitas::findOrFail($id);
        $facility->delete();

        return redirect()->route('admin.fasilitas.index')->with('success', 'Facility deleted successfully.');
    }
}