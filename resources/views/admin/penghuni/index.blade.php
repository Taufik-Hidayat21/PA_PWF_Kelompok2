@extends('layouts.master')

@section('top')
@endsection

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4>Daftar Penghuni</h4>
                    <a href="{{ route('admin.penghuni.create') }}" class="btn btn-primary float-right">Tambah Penghuni</a>
                </div>
                <div class="card-body">
                    @if(session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                    @endif
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>Nama</th>
                                <th>Email</th>
                                <th>No. Telepon</th>
                                <th>Kamar</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($residents as $resident)
                            <tr>
                                <td>{{ $resident->nama }}</td>
                                <td>{{ $resident->email }}</td>
                                <td>{{ $resident->no_telp }}</td>
                                <td>{{ $resident->kamar->no_kamar }}</td>
                                <td>
                                    <a href="{{ route('admin.penghuni.edit', $resident->id) }}" class="btn btn-primary btn-sm">Edit</a>
                                    <form action="{{ route('admin.penghuni.destroy', $resident->id) }}" method="POST" class="d-inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda yakin ingin menghapus penghuni ini?')">Hapus</button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection