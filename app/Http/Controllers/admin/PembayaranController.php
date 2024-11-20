<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Pembayaran;
use App\Models\Penghuni;
use App\Models\Kamar;
use Illuminate\Support\Facades\Storage;

class PembayaranController extends Controller
{
    /**
     * Display a listing of the payments.
     */
    public function index()
    {
        $payments = Pembayaran::with(['penghuni', 'kamar'])->latest()->get();
        return view('admin.pembayaran.index', compact('payments'));
    }

    /**
     * Show the form for creating a new payment.
     */
    public function create()
    {
        $penghunis = Penghuni::all();
        $kamars = Kamar::all();
        return view('admin.pembayaran.create', compact('penghunis', 'kamars'));
    }

    /**
     * Store a newly created payment in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'penghuni_id' => 'required|exists:penghunis,id',
            'kamar_id' => 'required|exists:kamars,id',
            'amount' => 'required|numeric|min:0',
            'payment_date' => 'required|date',
            'status' => 'required|in:pending,paid,overdue',
        ]);

        $payment = new Pembayaran($validated);


        $payment->save();

        return redirect()
            ->route('admin.pembayaran.index')
            ->with('success', 'Pembayaran berhasil ditambahkan.');
    }

    /**
     * Display the specified payment.
     */
    public function show($id)
    {
        $payment = Pembayaran::with(['penghuni', 'kamar'])->findOrFail($id);
        return view('admin.pembayaran.show', compact('payment'));
    }

    /**
     * Show the form for editing the specified payment.
     */
    public function edit($id)
    {
        $payment = Pembayaran::findOrFail($id);
        $penghunis = Penghuni::all();
        $kamars = Kamar::all();
        return view('admin.pembayaran.edit', compact('payment', 'penghunis', 'kamars'));
    }

    /**
     * Update the specified payment in storage.
     */
    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'penghuni_id' => 'required|exists:penghunis,id',
            'kamar_id' => 'required|exists:kamars,id',
            'amount' => 'required|numeric|min:0',
            'payment_date' => 'required|date',
            'status' => 'required|in:pending,paid,overdue',
        ]);

        $payment = Pembayaran::findOrFail($id);

        if ($request->hasFile('bukti_pembayaran')) {
            // Delete old image if exists
            if ($payment->bukti_pembayaran) {
                Storage::disk('public')->delete($payment->bukti_pembayaran);
            }
            
            $file = $request->file('bukti_pembayaran');
            $path = $file->store('bukti_pembayaran', 'public');
            $validated['bukti_pembayaran'] = $path;
        }

        $payment->update($validated);

        return redirect()
            ->route('admin.pembayaran.index')
            ->with('success', 'Pembayaran berhasil diperbarui.');
    }

    /**
     * Remove the specified payment from storage.
     */
    public function destroy($id)
    {
        $payment = Pembayaran::findOrFail($id);
        
        // Delete bukti pembayaran file if exists
        if ($payment->bukti_pembayaran) {
            Storage::disk('public')->delete($payment->bukti_pembayaran);
        }
        
        $payment->delete();

        return redirect()
            ->route('admin.pembayaran.index')
            ->with('success', 'Pembayaran berhasil dihapus.');
    }
}