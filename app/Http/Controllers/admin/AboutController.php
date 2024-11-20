<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\About;

class AboutController extends Controller
{
    /**
     * Display a listing of the about page.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $about = About::first();
        return view('admin.about.index', compact('about'));
    }

    /**
     * Show the form for editing the about page.
     *
     * @return \Illuminate\Http\Response
     */
    public function edit()
    {
        $about = About::first();
        return view('admin.about.edit', compact('about'));
    }

    /**
     * Update the about page in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $about = About::first();
        $about->update($request->all());
        return redirect()->route('admin.about.index')->with('success', 'About page updated successfully.');
    }
}