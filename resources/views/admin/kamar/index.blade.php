@extends('layouts.master')

@section('top')
@endsection

@section('content')
    <div class="container">
        <h1>Rooms</h1>

        <a href="{{ route('admin.kamar.create') }}" class="btn btn-primary mb-3">Add New Room</a>

        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <table class="table table-striped">
            <thead>
                <tr>
                    <th>No Kamar</th>
                    <th>Kapasitas</th>
                    <th>Harga</th>
                    <th>Status</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($kamars as $kamar)
                    <tr>
                        <td>{{ $kamar->no_kamar }}</td>
                        <td>{{ $kamar->kapasitas }}</td>
                        <td>{{ $kamar->harga }}</td>
                        <td>{{ $kamar->status }}</td>
                        <td>
                            <a href="{{ route('admin.kamar.edit', $kamar->id) }}" class="btn btn-primary btn-sm">Edit</a>
                            <form action="{{ route('admin.kamar.destroy', $kamar->id) }}" method="POST" style="display: inline-block;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this room?')">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection