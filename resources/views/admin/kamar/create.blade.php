@extends('layouts.master')

@section('top')
@endsection

@section('content')
    <div class="container">
        <h1>Create New Room</h1>

        <form action="{{ route('admin.kamar.store') }}" method="POST">
            @csrf

            <div class="form-group">
                <label for="no_kamar">Room Number</label>
                <input type="text" class="form-control" id="no_kamar" name="no_kamar" required>
            </div>

            <div class="form-group">
                <label for="kapasitas">Capacity</label>
                <input type="number" class="form-control" id="kapasitas" name="kapasitas" required>
            </div>

            <div class="form-group">
                <label for="harga">Price</label>
                <input type="number" class="form-control" id="harga" name="harga" required>
            </div>

            <div class="form-group">
                <label for="status">Status</label>
                <select class="form-control" id="status" name="status" required>
                    <option value="available">Available</option>
                    <option value="occupied">Occupied</option>
                    <option value="under_maintenance">Under Maintenance</option>
                </select>
            </div>

            <button type="submit" class="btn btn-primary">Save</button>
        </form>
    </div>
@endsection