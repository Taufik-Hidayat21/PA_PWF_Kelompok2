<?php

namespace App\Http\Controllers;

use App\Models\Gallery;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class GalleryController extends Controller{
    public function index()
    {
        $galeri = Gallery::paginate(12); // Menampilkan 12 foto per halaman
            
        return view('pages.galeri.index', compact('galeri'));
    }

    public function detail($id)
    {
        $galeri = Gallery::findOrFail($id);
        
        $relatedGalleries = Gallery::where('id', '!=', $id)
            ->latest()
            ->take(3)
            ->get();
            
        return view('pages.galeri.detail', compact('galeri', 'relatedGalleries'));
    }
}
