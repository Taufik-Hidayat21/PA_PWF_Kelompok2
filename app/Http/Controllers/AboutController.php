<?php
// app/Http/Controllers/AboutController.php

namespace App\Http\Controllers;

use App\Models\About;
use Illuminate\Http\Request;

class AboutController extends Controller
{
    public function index()
    {
        $about = About::first();
        // dd([
        //     'about' => $about,
        //     'exists' => About::exists(),
        //     'count' => About::count()
        // ]); 
        return view('pages.about.index', compact('about'));
    }

    public function sejarah()
    {
        $about = About::first(); // Ambil data about
        
        // Konversi string sejarah menjadi array jika diperlukan
        // Asumsikan data sejarah disimpan dalam format JSON
        $sejarah = json_decode($about->sejarah);
        
        return view('pages.about.sejarah', compact('sejarah', 'about'));
    }

    public function visi()
    {
        $visi = 'Menjadi asrama mahasiswa yang unggul dalam pelayanan dan pembinaan mahasiswa untuk menghasilkan lulusan yang berkualitas dan berakhlak mulia.';

        return view('pages.about.visi', compact('visi'));
    }
    public function misi()
    {
        $misi = [
            'Menyelenggarakan pelayanan asrama yang nyaman dan kondusif',
            'Melaksanakan pembinaan karakter dan soft skill mahasiswa',
            'Mengembangkan potensi akademik dan non-akademik mahasiswa',
            // Tambahkan poin misi lainnya sesuai kebutuhan
        ];

        

        return view('pages.about.misi', compact('misi'));
    }

    public function strukturOrganisasi()
{
    // Mengambil data struktur organisasi
    $strukturOrganisasi = About::select('struktur_organisasi', 'struktur_organisasi_image')->first();
    
    // Tambahkan data pengurus untuk ditampilkan di section Team Members
    $pengurus = [
        [
            'nama' => 'Hadiyanto',
            'jabatan' => 'MPO',
            'foto' => null,
            'deskripsi' => null,
            'kontak' => [
                'email' => null,
                'telepon' => null
            ]
        ],
        [
            'nama' => 'Sufi Anugrah',
            'jabatan' => 'Ketua Umum',
            'foto' => null,
            'deskripsi' => null,
            'kontak' => [
                'email' => null,
                'telepon' => null
            ]
        ],
        [
            'nama' => 'Muhammad Annas Rizqi',
            'jabatan' => 'Sekretaris',
            'foto' => null,
            'deskripsi' => null,
            'kontak' => [
                'email' => null,
                'telepon' => null
            ]
        ],
        [
            'nama' => 'Caleg Sianturi',
            'jabatan' => 'Bendahara',
            'foto' => null,
            'deskripsi' => null,
            'kontak' => [
                'email' => null,
                'telepon' => null
            ]
        ],
        [
            'nama' => 'Abdul Gapar',
            'jabatan' => 'Ketua Divisi Kaderisasi dan Media',
            'foto' => null,
            'deskripsi' => null,
            'kontak' => [
                'email' => null,
                'telepon' => null
            ]
        ],
        [
            'nama' => 'Oktavianus Railim',
            'jabatan' => 'Ketua Divisi Kesehatan Jasmani dan Rohani',
            'foto' => null,
            'deskripsi' => null,
            'kontak' => [
                'email' => null,
                'telepon' => null
            ]
        ],
        [
            'nama' => 'Muhammad Dul Fiqri',
            'jabatan' => 'Ketua Kebersihan dan Keamanan',
            'foto' => null,
            'deskripsi' => null,
            'kontak' => [
                'email' => null,
                'telepon' => null
            ]
        ]
    ];

    return view('pages.about.struktur-organisasi', compact('strukturOrganisasi', 'pengurus'));
}
}