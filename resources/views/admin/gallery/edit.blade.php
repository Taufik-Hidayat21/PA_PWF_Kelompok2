@extends('layouts.master')

@section('top')
@endsection

@section('content')
    <div class="container">
        <h1>Edit Galleries</h1>

        <form action="{{ route('admin.gallery.update', $gallery->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label for="name">Title</label>
                <input type="text" class="form-control" id="name" name="title" value="{{ $gallery->nama }}" required>
            </div>

            <div class="form-group">
                <label for="description">Description</label>
                <textarea class="form-control" id="description" name="description" rows="3" required>{{ $gallery->description }}</textarea>
            </div>

            <div class="form-group">
                <label for="image">Image</label>
                <input type="file" class="form-control-file" id="image" name="image">
                <img src="{{ asset('images/gallery' . $gallery->image) }}" alt="{{ $gallery->title }}" width="100" class="mt-2">
            </div>

            <button type="submit" class="btn btn-primary">Update</button>
        </form>
    </div>
@endsection