@extends('layouts.user')

@section('content')
    <h1>Riwayat Pembayaran</h1>

    <table class="table">
        <thead>
            <tr>
                <th>Tagihan</th>
                <th>Jumlah</th>
                <th>Tanggal Pembayaran</th>
                <th>Status</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($pembayarans as $pembayaran)
                <tr>
                    <td>{{ $pembayaran->tagihan }}</td>
                    <td>{{ $pembayaran->jumlah }}</td>
                    <td>{{ $pembayaran->tanggal_pembayaran }}</td>
                    <td>{{ $pembayaran->status }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection