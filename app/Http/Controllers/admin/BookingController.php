<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Booking;
use App\Models\Penghuni;
use App\Models\Kamar;
use Illuminate\Http\Request;

class BookingController extends Controller
{
    /**
     * Display a listing of bookings.
     */
    public function index()
    {
        $bookings = Booking::all(); // Memuat penghuni dan kamar terkait
        return view('admin.booking.index', compact('bookings'));
    }

    /**
     * Show the form for creating a new booking.
     */
    public function create()
    {
        $penghunis = Penghuni::all(); // Data penghuni
        $kamars = Kamar::where('status', 'available')->get(); // Kamar yang tersedia
        return view('bookings.create', compact('penghunis', 'kamars'));
    }

    /**
     * Store a newly created booking in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'penghuni_id' => 'required|exists:penghunis,id',
            'kamar_id' => 'required|exists:kamars,id',
            'check_in' => 'required|date|after_or_equal:today',
            'check_out' => 'required|date|after:check_in',
            'status' => 'required|in:pending,confirmed,canceled',
        ]);

        Booking::create($validatedData);

        // Update status kamar menjadi occupied
        $kamar = Kamar::find($request->kamar_id);
        $kamar->status = 'occupied';
        $kamar->save();

        return redirect()->route('bookings.index')->with('success', 'Booking created successfully.');
    }

    /**
     * Display the specified booking.
     */
    public function show(Booking $booking)
    {
        $booking->load(['penghuni', 'kamar', 'pembayaran']); // Memuat relasi
        return view('bookings.show', compact('booking'));
    }

    /**
     * Show the form for editing the specified booking.
     */
    public function edit(Booking $booking)
    {
        $penghunis = Penghuni::all();
        $kamars = Kamar::where('status', 'available')->orWhere('id', $booking->kamar_id)->get();
        return view('bookings.edit', compact('booking', 'penghunis', 'kamars'));
    }

    /**
     * Update the specified booking in storage.
     */
    public function update(Request $request, Booking $booking)
    {
        $validatedData = $request->validate([
            'penghuni_id' => 'required|exists:penghunis,id',
            'kamar_id' => 'required|exists:kamars,id',
            'check_in' => 'required|date|after_or_equal:today',
            'check_out' => 'required|date|after:check_in',
            'status' => 'required|in:pending,confirmed,canceled',
        ]);

        // Jika kamar diupdate, ubah status kamar sebelumnya menjadi available
        if ($booking->kamar_id != $request->kamar_id) {
            $oldKamar = Kamar::find($booking->kamar_id);
            $oldKamar->status = 'available';
            $oldKamar->save();

            // Update status kamar baru menjadi occupied
            $newKamar = Kamar::find($request->kamar_id);
            $newKamar->status = 'occupied';
            $newKamar->save();
        }

        $booking->update($validatedData);

        return redirect()->route('bookings.index')->with('success', 'Booking updated successfully.');
    }

    /**
     * Remove the specified booking from storage.
     */
    public function destroy(Booking $booking)
    {
        // Update status kamar menjadi available jika booking dihapus
        $kamar = Kamar::find($booking->kamar_id);
        $kamar->status = 'available';
        $kamar->save();

        $booking->delete();

        return redirect()->route('bookings.index')->with('success', 'Booking deleted successfully.');
    }
}
