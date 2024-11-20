@extends('layouts.master')

@section('top')
@endsection

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4>Tambah Penghuni Baru</h4>
                </div>
                <div class="card-body">
                {{-- resources/views/admin/penghuni/create.blade.php --}}

                <form action="{{ route('admin.penghuni.store') }}" method="POST">
                    @csrf
                    
                    <div class="form-group">
                        <label for="nama">Nama</label>
                        <input type="text" class="form-control @error('nama') is-invalid @enderror" 
                            id="nama" name="nama" value="{{ old('nama') }}" required>
                        @error('nama')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" class="form-control @error('email') is-invalid @enderror" 
                            id="email" name="email" value="{{ old('email') }}" required>
                        @error('email')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="no_telepon">No. Telepon</label>
                        <input type="text" class="form-control @error('no_telepon') is-invalid @enderror" 
                            id="no_telepon" name="no_telepon" value="{{ old('no_telepon') }}" required>
                        @error('no_telepon')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="kamar_id">Kamar</label>
                        <select class="form-control @error('kamar_id') is-invalid @enderror" 
                            id="kamar_id" name="kamar_id" required>
                            <option value="">Pilih Kamar</option>
                            @foreach($kamars as $kamar)
                                <option value="{{ $kamar->id }}" 
                                    {{ old('kamar_id') == $kamar->id ? 'selected' : '' }}>
                                    No Kamar: {{ $kamar->no_kamar }} - Harga: Rp{{ number_format($kamar->harga, 0, ',', '.') }}
                                    ({{ $kamar->status }})
                                </option>
                            @endforeach
                        </select>
                        @error('kamar_id')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <button type="submit" class="btn btn-primary">Simpan</button>
                </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection