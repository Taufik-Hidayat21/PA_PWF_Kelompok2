@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4 py-8">
    <div class="max-w-4xl mx-auto">
        <!-- Breadcrumb -->
        <nav class="flex mb-8" aria-label="Breadcrumb">
            <ol class="inline-flex items-center space-x-1 md:space-x-3">
                <li class="inline-flex items-center">
                    <a href="{{ route('home') }}" class="text-gray-600 hover:text-gray-800">
                        Home
                    </a>
                </li>
                <li class="inline-flex items-center">
                    <svg class="w-6 h-6 text-gray-400" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd"/>
                    </svg>
                    <a href="{{ route('fasilitas.index') }}" class="text-gray-600 hover:text-gray-800">
                        Fasilitas
                    </a>
                </li>
                <li aria-current="page">
                    <svg class="w-6 h-6 text-gray-400" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd"/>
                    </svg>
                    <span class="text-gray-800">{{ $fasilitas->nama }}</span>
                </li>
            </ol>
        </nav>

        <!-- Main Content -->
        <div class="bg-white rounded-lg shadow-lg overflow-hidden">
            <img src="{{ asset('images/fasilitas/' . $fasilitas->gambar) }}" 
                 alt="{{ $fasilitas->nama }}" 
                 class="w-full h-96 object-cover">
            
            <div class="p-8">
                <h1 class="text-3xl font-bold text-gray-800 mb-4">{{ $fasilitas->nama }}</h1>
                <div class="prose max-w-none">
                    {!! $fasilitas->deskripsi !!}
                </div>

                <!-- Additional Info -->
                @if($fasilitas->spesifikasi)
                <div class="mt-8">
                    <h2 class="text-xl font-semibold text-gray-800 mb-4">Spesifikasi</h2>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        @foreach(json_decode($fasilitas->spesifikasi) as $key => $value)
                        <div class="flex items-center">
                            <span class="text-gray-600">{{ $key }}:</span>
                            <span class="ml-2 text-gray-800">{{ $value }}</span>
                        </div>
                        @endforeach
                    </div>
                </div>
                @endif
            </div>
        </div>
    </div>
</div>
@endsection