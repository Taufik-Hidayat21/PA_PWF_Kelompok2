@extends('layouts.app')

@section('content')
<div class="min-h-screen flex items-center justify-center bg-gray-100 py-12 px-4 sm:px-6 lg:px-8">
    <div class="max-w-md w-full space-y-8">
        <div>
            <h2 class="mt-6 text-center text-3xl font-bold text-gray-900">
                Login Asrama UNMUL
            </h2>
        </div>
        <form class="mt-8 space-y-6" action="{{ route('login') }}" method="POST">
            @csrf
            <div class="rounded-md shadow-sm -space-y-px">
                <div>
                    <label for="email" class="sr-only">Email address</label>
                    <input id="email" name="email" type="email" required class="appearance-none rounded-none relative block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 rounded-t-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 focus:z-10 sm:text-sm" placeholder="Email address" value="{{ old('email') }}">
                    @error('email')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>
                <div>
                    <label for="password" class="sr-only">Password</label>
                    <input id="password" name="password" type="password" required class="appearance-none rounded-none relative block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 rounded-b-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 focus:z-10 sm:text-sm" placeholder="Password">
                    @error('password')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>
            </div>

            <!-- Radio button untuk role
            <div class="space-y-4">
                <div class="flex items-center space-x-4">
                    <div class="flex items-center">
                        <input id="admin" name="role_id" type="radio" value="1" class="h-4 w-4 text-indigo-600 focus:ring-indigo-500 border-gray-300" {{ old('role_id') == '1' ? 'checked' : '' }}>
                        <label for="admin" class="ml-2 block text-sm text-gray-900">
                            Admin
                        </label>
                    </div>
                    <div class="flex items-center">
                        <input id="mahasiswa" name="role_id" type="radio" value="2" class="h-4 w-4 text-indigo-600 focus:ring-indigo-500 border-gray-300" {{ old('role_id') == '2' ? 'checked' : '' }}>
                        <label for="mahasiswa" class="ml-2 block text-sm text-gray-900">
                            Mahasiswa
                        </label>
                    </div>
                </div>
                @error('role_id')
                    <p class="text-red-500 text-xs">{{ $message }}</p>
                @enderror
            </div> -->

            <div class="flex items-center justify-between">
                <div class="flex items-center">
                    <input id="remember_me" name="remember" type="checkbox" class="h-4 w-4 text-indigo-600 focus:ring-indigo-500 border-gray-300 rounded">
                    <label for="remember_me" class="ml-2 block text-sm text-gray-900">
                        Remember me
                    </label>
                </div>
            </div>

            <div>
                <button type="submit" class="group relative w-full flex justify-center py-2 px-4 border border-transparent text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                    Login
                </button>
            </div>
        </form>
    </div>
</div>
@endsection