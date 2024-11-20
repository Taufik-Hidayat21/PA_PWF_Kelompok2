<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Penghuni;
use App\Models\Kamar;

class PenghuniController extends Controller
{
    public function index()
    {
        $residents = Penghuni::all();
        return view('admin.penghuni.index', compact('residents'));
    }
    
    public function create()
    {
        $kamars = Kamar::where('status', 'available')->get();
        return view('admin.penghuni.create', compact('kamars'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama' => 'required',
            'email' => 'required|email|unique:penghunis,email',
            'no_telepon' => 'required',  // Sudah benar menggunakan no_telepon
            'kamar_id' => 'required|exists:kamars,id',
        ]);

        // Buat penghuni menggunakan data tervalidasi
        $resident = Penghuni::create($validated);

        // Update status kamar
        Kamar::where('id', $request->kamar_id)
            ->update(['status' => 'occupied']);

        return redirect()->route('admin.penghuni.index')
            ->with('success', 'Data penghuni berhasil ditambahkan');
    }

    public function edit($id)
    {
        $resident = Penghuni::findOrFail($id);
        $kamars = Kamar::where('status', 'available')
                    ->orWhere('id', $resident->kamar_id)
                    ->get();
        return view('admin.penghuni.edit', compact('resident', 'kamars'));
    }

    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'nama' => 'required',
            'email' => 'required|email|unique:penghunis,email,' . $id,
            'no_telepon' => 'required',  // Sudah benar menggunakan no_telepon
            'kamar_id' => 'required|exists:kamars,id',
        ]);

        $resident = Penghuni::findOrFail($id);
        
        // Cek perubahan kamar
        if ($resident->kamar_id != $request->kamar_id) {
            // Set kamar lama menjadi available
            Kamar::where('id', $resident->kamar_id)
                ->update(['status' => 'available']);
            
            // Set kamar baru menjadi occupied
            Kamar::where('id', $request->kamar_id)
                ->update(['status' => 'occupied']);
        }

        // Update menggunakan data tervalidasi
        $resident->update($validated);

        return redirect()->route('admin.penghuni.index')
            ->with('success', 'Data penghuni berhasil diupdate');
    }

    public function destroy($id)
    {
        $resident = Penghuni::findOrFail($id);
        
        Kamar::where('id', $resident->kamar_id)
            ->update(['status' => 'available']);
            
        $resident->delete();

        return redirect()->route('admin.penghuni.index')
            ->with('success', 'Data penghuni berhasil dihapus');
    }
}