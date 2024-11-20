<?php
namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Booking;
use App\Models\Pembayaran;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;


class DashboardController extends Controller
{
    public function index()
    {
        try {
            $bookings = Booking::active()->byUser(Auth::id())->count();
            $pembayarans = Pembayaran::byUser(Auth::id())->count();

            return view('user.dashboard.index', compact('bookings', 'pembayarans'));
        } catch (\Exception $e) {
            Log::error('Error in UserDashboardController@index: ' . $e->getMessage());
            Log::error($e->getTraceAsString());
            return back()->withErrors(['error' => 'An error occurred while loading the dashboard.']);
        }
    }
}