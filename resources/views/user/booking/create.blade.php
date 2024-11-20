@extends('layouts.user')

@section('content')
    <h1>Buat Booking Baru</h1>

    <form action="{{ route('user.booking.store') }}" method="POST">
        @csrf

        <div class="form-group">
            <label for="kamar_id">Pilih Kamar</label>
            <select class="form-control" id="kamar_id" name="kamar_id">
                <option value="">Pilih Kamar</option>
                @foreach ($kamars as $kamar)
                    <option value="{{ $kamar->id }}">{{ $kamar->nomor }}</option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="check_in">Check-in</label>
            <input type="date" class="form-control" id="check_in" name="check_in" required>
        </div>

        <div class="form-group">
            <label for="check_out">Check-out</label>
            <input type="date" class="form-control" id="check_out" name="check_out" required>
        </div>

        <button type="submit" class="btn btn-primary">Buat Booking</button>
    </form>
@endsection