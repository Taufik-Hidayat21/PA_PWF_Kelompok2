<?php

namespace App\Http\Controllers\Admin;

use App\Models\Gallery;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class GalleryController extends Controller
{
    public function index()
    {
        $galleries = Gallery::all();
        return view('admin.gallery.index', compact('galleries'));
    }
    public function index12()
    {
        $galeri = Gallery::paginate(12); // Menampilkan 12 foto per halaman
            
        return view('pages.galeri.index', compact('galeri'));
    }
    /**
     * Show the form for creating a new gallery.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.gallery.create');
    }

    /**
     * Store a newly created gallery in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required',
            'description' => 'required',
            'image' => 'required|image|max:2048',
        ]);

        $gallery = new Gallery();
        $gallery->title = $request->title;
        $gallery->description = $request->description;
        $gallery->image = $request->file('image')->store('Gallery', 'public');
        $gallery->save();

        return redirect()->route('admin.gallery.index')->with('success', 'Gallery created successfully.');
    }

    /**
     * Show the form for editing the specified gallery.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $gallery = Gallery::findOrFail($id);
        return view('admin.gallery.edit', compact('gallery'));
    }

    /**
     * Update the specified gallery in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'title' => 'required',
            'description' => 'required',
            'image' => 'nullable|image|max:2048',
        ]);

        $gallery = Gallery::findOrFail($id);
        $gallery->title = $request->title;
        $gallery->description = $request->description;
        if ($request->hasFile('image')) {
            $gallery->image = $request->file('image')->store('galleries', 'public');
        }
        $gallery->save();

        return redirect()->route('admin.gallery.index')->with('success', 'gallery updated successfully.');
    }

    /**
     * Remove the specified gallery from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $gallery = Gallery::findOrFail($id);
        $gallery->delete();

        return redirect()->route('admin.gallery.index')->with('success', 'gallery deleted successfully.');
    }
    
}