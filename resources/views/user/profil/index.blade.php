<!-- resources/views/user/profil/index.blade.php -->
@extends('layouts.user')

@section('content')
    <h1>Profil Saya</h1>

    <form action="{{ route('user.profil.update') }}" method="POST">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="name">Nama</label>
            <input type="text" class="form-control" id="name" name="name" value="{{ $user->name }}">
        </div>

        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" class="form-control" id="email" name="email" value="{{ $user->email }}">
        </div>

        <button type="submit" class="btn btn-primary">Perbarui Profil</button>
    </form>
@endsection