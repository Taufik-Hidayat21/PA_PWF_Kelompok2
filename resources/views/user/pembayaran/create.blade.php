@extends('layouts.user')

@section('content')
    <h1>Buat Pembayaran Baru</h1>

    <form action="{{ route('user.pembayaran.store') }}" method="POST">
        @csrf

        <div class="form-group">
            <label for="tagihan">Tagihan</label>
            <input type="text" class="form-control" id="tagihan" name="tagihan" required>
        </div>

        <div class="form-group">
            <label for="jumlah">Jumlah</label>
            <input type="number" class="form-control" id="jumlah" name="jumlah" required>
        </div>

        <div class="form-group">
            <label for="tanggal_pembayaran">Tanggal Pembayaran</label>
            <input type="date" class="form-control" id="tanggal_pembayaran" name="tanggal_pembayaran" required>
        </div>

        <button type="submit" class="btn btn-primary">Buat Pembayaran</button>
    </form>
@endsection