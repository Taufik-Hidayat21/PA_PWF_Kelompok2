@extends('layouts.master')
@section('content')
    <div class="container">
        <h1>Edit Facility</h1>
        <form action="{{ route('admin.fasilitas.update', $facility->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" class="form-control" id="name" name="name" 
                    value="{{ old('name', $facility->nama) }}" required>
            </div>
            <div class="form-group">
                <label for="description">Description</label>
                <textarea class="form-control" id="description" name="description" 
                    rows="3" required>{{ old('description', $facility->deskripsi) }}</textarea>
            </div>
            <div class="form-group">
                <label for="image">Image</label>
                <input type="file" class="form-control-file" id="image" name="image">
                @if($facility->gambar)
                    <img src="{{ Storage::url($facility->gambar) }}" 
                        alt="{{ $facility->nama }}" width="100" class="mt-2">
                @endif
            </div>
            <button type="submit" class="btn btn-primary">Update</button>
        </form>
    </div>
@endsection