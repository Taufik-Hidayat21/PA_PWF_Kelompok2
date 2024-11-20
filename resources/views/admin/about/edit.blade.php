@extends('layouts.admin')

@section('content')
    <div class="container">
        <h1>Edit About Page</h1>
        <form action="{{ route('admin.about.update') }}" method="POST">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="content">Content</label>
                <textarea name="content" id="content" class="form-control" rows="5">{{ $about->content }}</textarea>
            </div>
            <button type="submit" class="btn btn-primary">Save</button>
        </form>
    </div>
@endsection