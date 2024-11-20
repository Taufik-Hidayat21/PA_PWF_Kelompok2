@extends('layouts.master')

@section('top')
@endsection

@section('content')
    <div class="container">
        <h1>Edit Room</h1>

        <form action="{{ route('admin.kamar.update', $kamar->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label for="no_kamar">Room Number</label>
                <input type="text" class="form-control" id="no_kamar" name="no_kamar" value="{{ $kamar->no_kamar }}" required>
            </div>

            <div class="form-group">
                <label for="kapasitas">Capacity</label>
                <input type="number" class="form-control" id="kapasitas" name="kapasitas" value="{{ $kamar->kapasitas }}" required>
            </div>

            <div class="form-group">
                <label for="harga">Price</label>
                <input type="number" class="form-control" id="harga" name="harga" value="{{ $kamar->harga }}" required>
            </div>

            <div class="form-group">
                <label for="status">Status</label>
                <select class="form-control" id="status" name="status" required>
                    <option value="available" {{ $kamar->status == 'available' ? 'selected' : '' }}>Available</option>
                    <option value="occupied" {{ $kamar->status == 'occupied' ? 'selected' : '' }}>Occupied</option>
                    <option value="under_maintenance" {{ $kamar->status == 'under_maintenance' ? 'selected' : '' }}>Under Maintenance</option>
                </select>
            </div>

            <button type="submit" class="btn btn-primary">Update</button>
        </form>
    </div>
@endsection