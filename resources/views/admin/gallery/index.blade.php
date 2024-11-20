@extends('layouts.master')

@section('top')
@endsection

@section('content')
    <div class="container">
        <h1>Galleries</h1>

        <a href="{{ route('admin.gallery.create') }}" class="btn btn-primary mb-3">Add New Gallery</a>

        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Image</th>
                    <th>Title</th>
                    <th>Description</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($galleries as $gallery)
                    <tr>
                        <td><img src="{{ asset('storage/' . $gallery->image) }}" alt="{{ $gallery->title }}" width="100"></td>
                        <td>{{ $gallery->title }}</td>
                        <td>{{ $gallery->description }}</td>
                        <td>
                            <a href="{{ route('admin.gallery.edit', $gallery->id) }}" class="btn btn-primary btn-sm">Edit</a>
                            <form action="{{ route('admin.gallery.destroy', $gallery->id) }}" method="POST" style="display: inline-block;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this gallery?')">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection