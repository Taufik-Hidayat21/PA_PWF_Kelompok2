<?php
namespace App\Http\Controllers;

use App\Models\Fasilitas;
use Illuminate\Http\Request;

class FasilitasController extends Controller
{
    public function index(Request $request)
    {
        $query = Fasilitas::query();
        
        // Filter berdasarkan kategori jika ada
        if ($request->has('nama')) {
            $query->where('nama', $request->nama);
        }
        
        // Ambil data dengan pagination
        $fasilitas = $query->paginate(6); // 6 item per halaman
        
        // Ambil semua nama untuk filter
        $namas = Fasilitas::distinct('nama')->pluck('nama');
        
        return view('pages.fasilitas.index', compact('fasilitas', 'namas'));
    }

    public function detail($id)
    {
        $fasilitas = Fasilitas::findOrFail($id);
        
        $relatedFasilitas = Fasilitas::where('id', '!=', $id)
            ->where('nama', $fasilitas->nama)
            ->take(3)
            ->get();

        return view('pages.fasilitas.detail', compact('fasilitas', 'relatedFasilitas'));
    }
}