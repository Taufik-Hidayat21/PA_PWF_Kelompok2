@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4 py-6">
    <!-- Hero Section with Background -->
    <div class="relative bg-gradient-to-r from-green-600 to-green-800 rounded-lg shadow-lg mb-12">
        <div class="absolute inset-0 bg-black opacity-40 rounded-lg"></div>
        <div class="relative py-16 px-8 text-center">
            <h1 class="text-4xl font-bold text-white mb-4">Tentang Asrama UNMUL</h1>
            <p class="text-gray-100 text-lg max-w-2xl mx-auto">
                Mengenal lebih dekat tentang Asrama Mahasiswa Universitas Mulawarman
            </p>
        </div>
    </div>

    <!-- Quick Links with Improved Cards -->
    <div class="grid grid-cols-1 md:grid-cols-3 gap-8 mb-12">
        <div class="group">
            <a href="{{ route('about.sejarah') }}" 
               class="block bg-white rounded-xl shadow-md p-8 hover:shadow-xl transition-all duration-300 border border-gray-100 h-full">
                <div class="flex flex-col h-full">
                    <div class="mb-4">
                        <svg class="w-12 h-12 text-green-600 mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                        <h3 class="text-xl font-semibold text-gray-800 group-hover:text-green-600 transition-colors">Sejarah</h3>
                    </div>
                    <p class="text-gray-600">Mengenal perjalanan dan perkembangan Asrama UNMUL dari masa ke masa.</p>
                </div>
            </a>
        </div>

        <div class="group">
            <a href="{{ route('about.visi') }}" 
               class="block bg-white rounded-xl shadow-md p-8 hover:shadow-xl transition-all duration-300 border border-gray-100 h-full">
                <div class="flex flex-col h-full">
                    <div class="mb-4">
                        <svg class="w-12 h-12 text-green-600 mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                        <h3 class="text-xl font-semibold text-gray-800 group-hover:text-green-600 transition-colors">Visi</h3>
                    </div>
                    <p class="text-gray-600">Tujuan dan gagasan kami dalam mengembangkan kualitas mahasiswa.</p>
                </div>
            </a>
        </div>

        <div class="group">
            <a href="{{ route('about.misi') }}" 
               class="block bg-white rounded-xl shadow-md p-8 hover:shadow-xl transition-all duration-300 border border-gray-100 h-full">
                <div class="flex flex-col h-full">
                    <div class="mb-4">
                        <svg class="w-12 h-12 text-green-600 mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path>
                        </svg>
                        <h3 class="text-xl font-semibold text-gray-800 group-hover:text-green-600 transition-colors">Misi</h3>
                    </div>
                    <p class="text-gray-600">Komitmen kami dalam mengembangkan kualitas mahasiswa.</p>
                </div>
            </a>
        </div>
    </div>

    <!-- Overview Section with Improved Layout -->
    <div class="bg-white rounded-xl shadow-lg overflow-hidden mb-12">
        <div class="grid grid-cols-1 md:grid-cols-2 gap-0">
            <div class="p-8 flex flex-col justify-center">
                <h2 class="text-3xl font-bold text-gray-800 mb-6">Asrama UNMUL</h2>
                <p class="text-gray-600 mb-8 leading-relaxed">
                    {{ $about->tentang }}
                </p>
                <div class="grid grid-cols-2 gap-8">
                    <div class="bg-green-50 rounded-lg p-4 text-center">
                        <span class="block text-3xl font-bold text-green-600 mb-2">{{ $about->total_penghuni }}</span>
                        <p class="text-gray-600 font-medium">Total Penghuni</p>
                    </div>
                    <div class="bg-green-50 rounded-lg p-4 text-center">
                        <span class="block text-3xl font-bold text-green-600 mb-2">{{ $about->kapasitas }}</span>
                        <p class="text-gray-600 font-medium">Kapasitas</p>
                    </div>
                </div>
            </div>
            <div class="relative h-full min-h-[400px]">
                <img src="{{ asset('images/asrama/gedung.png') }}" 
                     alt="Gedung Asrama UNMUL" 
                     class="absolute inset-0 w-full h-full object-cover">
            </div>
        </div>
    </div>

    <!-- Additional Content Section -->
    @if($about->additional_content)
    <div class="bg-white rounded-xl shadow-lg p-8">
        <div class="prose max-w-none">
            {!! $about->additional_content !!}
        </div>
    </div>
    @endif
</div>
@endsection