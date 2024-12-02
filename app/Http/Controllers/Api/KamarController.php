<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreKamarRequest;
use App\Models\Kamar;
use App\Http\Resources\KamarResource;
use App\Http\Requests\UpdateKamarRequest;
use Illuminate\Support\Facades\Auth;
class KamarController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {   
        if (!Auth::check()) {
            abort(403, 'Unauthorized action.');
        }
        $kamar = Kamar::all();
        $data = KamarResource::collection($kamar);
        // Change this line to use the TaskResource:
        return view('admin.kamar.index', ['data'=>$data]);
    }
    public function create()
    {
        return view('admin.kamar.create');
    }
    /**
     * Store a newly created resource in storage.
     */
    public function edit($id)
    {
        $kamar = Kamar::findOrFail($id);
        return view('admin.kamar.edit', compact('kamar'));
    }
    public function store(StoreKamarRequest $request)
    {
        $kamar = Kamar::create($request->validated());
        $data = Kamar::all();
        return view('admin.kamar.index', ['data'=>$data]);
        }

    /**
     * Display the specified resource.
     */
    public function show(Kamar $kamar)
    {
        return new KamarResource($kamar);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateKamarRequest $request, Kamar $kamar)
    {
        
        $kamar->update($request->validated());
        $data = Kamar::all();
        return view('admin.kamar.index', ['data'=>$data]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Kamar $kamar)
    {
        $kamar->delete();
        return response()->json(null, 204);
    }
}
