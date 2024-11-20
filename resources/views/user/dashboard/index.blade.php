@extends('layouts.user')

@section('content')
    <h1>Dashboard Saya</h1>

    <div class="row">
        <div class="col-md-6">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Booking</h5>
                    <p class="card-text">Anda memiliki {{ $bookings }} booking aktif.</p>
                    <a href="{{ route('user.booking.index') }}" class="btn btn-primary">Lihat Booking</a>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Pembayaran</h5>
                    <p class="card-text">Anda telah melakukan {{ $pembayarans }} pembayaran.</p>
                    <a href="{{ route('user.pembayaran.index') }}" class="btn btn-primary">Lihat Pembayaran</a>
                </div>
            </div>
        </div>
    </div>
@endsection