<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Pengumuman;

class PengumumanController extends Controller
{
    /**
     * Display a listing of the announcements.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $announcements = Pengumuman::all();
        return view('admin.pengumuman.index', compact('announcements'));
    }

    /**
     * Show the form for creating a new announcement.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.pengumuman.create');
    }

    /**
     * Store a newly created announcement in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'judul' => 'required',
            'isi' => 'required',
            'tanggal' => 'required|date',
        ]);

        $announcement = new Pengumuman();
        $announcement->judul = $request->judul;
        $announcement->isi = $request->isi;
        $announcement->tanggal = $request->tanggal;
        $announcement->save();

        return redirect()->route('admin.pengumuman.index')->with('success', 'Pengumuman baru berhasil ditambahkan.');
    }

    /**
     * Show the form for editing the specified announcement.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $announcement = Pengumuman::findOrFail($id);
        return view('admin.pengumuman.edit', compact('announcement'));
    }

    /**
     * Update the specified announcement in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'judul' => 'required',
            'isi' => 'required',
            'tanggal' => 'required|date',
        ]);

        $announcement = Pengumuman::findOrFail($id);
        $announcement->judul = $request->judul;
        $announcement->isi = $request->isi;
        $announcement->tanggal = $request->tanggal;
        $announcement->save();

        return redirect()->route('admin.pengumuman.index')->with('success', 'Pengumuman berhasil diperbarui.');
    }

    /**
     * Remove the specified announcement from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $announcement = Pengumuman::findOrFail($id);
        $announcement->delete();

        return redirect()->route('admin.pengumuman.index')->with('success', 'Pengumuman berhasil dihapus.');
    }
}