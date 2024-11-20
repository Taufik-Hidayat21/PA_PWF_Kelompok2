<?php
namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Pembayaran;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PembayaranController extends Controller
{
    public function index()
    {
        $pembayarans = Pembayaran::byUser(Auth::id())->get();
        return view('user.pembayaran.index', compact('pembayarans'));
    }

    public function create()
    {
        return view('user.pembayaran.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'tagihan' => 'required|string',
            'jumlah' => 'required|numeric',
            'tanggal_pembayaran' => 'required|date',
        ]);

        $pembayaran = Pembayaran::create([
            'user_id' => Auth::id(),
            'tagihan' => $request->tagihan,
            'jumlah' => $request->jumlah,
            'tanggal_pembayaran' => $request->tanggal_pembayaran,
            'status' => 'pending', // atau status awal lainnya
        ]);

        return redirect()->route('user.pembayaran.index')->with('success', 'Pembayaran berhasil dilakukan');
    }
}