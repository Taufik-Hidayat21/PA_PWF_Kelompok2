@extends('layouts.master')

@section('top')
@endsection

@section('content')
    <div class="container">
        <h1>Facilities</h1>

        <a href="{{ route('admin.fasilitas.create') }}" class="btn btn-primary mb-3">Add New Facility</a>

        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Image</th>
                    <th>Name</th>
                    <th>Description</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($facilities as $facility)
                    <tr>
                        <td><img src="{{ asset('storage/' . $facility->gambar) }}" alt="{{ $facility->nama }}" width="100"></td>
                        <td>{{ $facility->nama }}</td>
                        <td>{{ $facility->deskripsi }}</td>
                        <td>
                            <a href="{{ route('admin.fasilitas.edit', $facility->id) }}" class="btn btn-primary btn-sm">Edit</a>
                            <form action="{{ route('admin.fasilitas.destroy', $facility->id) }}" method="POST" style="display: inline-block;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this facility?')">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection