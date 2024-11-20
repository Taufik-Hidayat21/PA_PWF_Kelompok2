@extends('layouts.user')

@section('content')
    <h1>Booking Saya</h1>

    <table class="table">
        <thead>
            <tr>
                <th>Kamar</th>
                <th>Check-in</th>
                <th>Check-out</th>
                <th>Status</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($bookings as $booking)
                <tr>
                    <td>{{ $booking->kamar->nomor }}</td>
                    <td>{{ $booking->check_in }}</td>
                    <td>{{ $booking->check_out }}</td>
                    <td>{{ $booking->status }}</td>
                    <td>
                        <!-- Tambahkan aksi yang diinginkan, seperti batalkan booking, dll. -->
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection