<?php

namespace App\Http\Controllers;
use App\Models\Gallery;
use App\Models\Fasilitas;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $fasilitas = Fasilitas::all();
        
        // Tambahkan data testimonial (untuk sementara data statis)
        $testimonials = [
            [
                'name' => 'Ardan EL Surya',
                'role' => 'Penghuni Asrama',
                'message' => 'Sangat nyaman tinggal di asrama ini. Fasilitasnya lengkap dan pelayanannya memuaskan.',
                'image' => 'images/users/ardan.jpg'
            ],
            [
                'name' => 'John Iskandar',
                'role' => 'Penghuni Asrama',
                'message' => 'Lingkungan asrama yang kondusif untuk belajar dan bersosialisasi.',
                'image' => 'images/users/john.png'
            ],
            [
                'name' => 'Sapri Subianto',
                'role' => 'Alumni Asrama',
                'message' => 'Banyak pengalaman berharga yang didapat selama tinggal di asrama.',
                'image' => 'images/users/sapri.jpg'
            ],
        ];

        // Data galeri (untuk sementara data statis)
        
        $galeri = Gallery::paginate(12); // Menampilkan 12 foto per halaman
            
    

        return view('pages.home.index', compact('fasilitas', 'testimonials', 'galeri'));
    }
}