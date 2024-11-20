@extends('layouts.master')

@section('top')
@endsection

@section('content')
    <div class="container">
        <h1>About Page</h1>
        <a href="{{ route('admin.about.update') }}" class="btn btn-primary mb-3">Update About</a>

        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Tentang</th>
                    <th>Sejarah</th>
                    <th>Visi</th>
                    <th>Misi</th>
                </tr>
            </thead>
            <tbody>
                @foreach($about as $abouts)
                \Log::info($abouts);
                dd($abouts);


                    <tr>
                        <td>{{ $abouts->tentang }}</td>
                        <td>{{ $abouts->sejarah }}</td>
                        <td>{{ $abouts->visi }}</td>
                        <td>{{ $abouts->misi }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection