@extends('layouts.master')

@section('top')
@endsection

@section('content')
<div class="container">
    <h1>Daftar Pembayaran</h1>
    
    <!-- Pesan sukses setelah menambah, memperbarui, atau menghapus pembayaran -->
    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <!-- Tombol untuk menambah pembayaran -->
    <a href="{{ route('admin.pembayaran.create') }}" class="btn btn-primary mb-3">Tambah Pembayaran</a>

    <!-- Tabel Daftar Pembayaran -->
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>#</th>
                <th>Nama Penghuni</th>
                <th>Nomor Kamar</th>
                <th>Jumlah Pembayaran</th>
                <th>Tanggal Pembayaran</th>
                <th>Status Pembayaran</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($payments as $payment)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $payment->penghuni->nama }}</td>
                    <td>{{ $payment->kamar->no_kamar }}</td>
                    <td>Rp {{ number_format($payment->amount, 0, ',', '.') }}</td>
                    <td>{{ \Carbon\Carbon::parse($payment->payment_date)->format('d M Y') }}</td>
                    <td>
                        @if ($payment->status == 'pending')
                            <span class="badge bg-warning">Pending</span>
                        @elseif ($payment->status == 'paid')
                            <span class="badge bg-success">Paid</span>
                        @elseif ($payment->status == 'overdue')
                            <span class="badge bg-danger">Overdue</span>
                        @endif
                    </td>
                    <td>
                        
                        <!-- Tombol Edit -->
                        <a href="{{ route('admin.pembayaran.edit', $payment->id) }}" class="btn btn-warning btn-sm">Edit</a>
                            <form action="{{ route('admin.pembayaran.destroy', $payment->id) }}" method="POST" style="display: inline-block;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this payment?')">Delete</button>
                            </form>
                        <!-- Tombol Hapus -->
                        
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
