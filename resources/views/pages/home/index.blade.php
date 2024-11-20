@extends('layouts.app')

@section('title', 'Beranda - Asrama Universitas Mulawarman')

@section('content')
    <!-- Hero Section -->
    @include('partials.hero')

    <!-- Statistik Section -->
    <section class="py-16 bg-gray-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 md:grid-cols-4 gap-8">
                <div class="bg-white p-6 rounded-lg shadow-md text-center">
                    <h3 class="text-4xl font-bold text-green-600">500+</h3>
                    <p class="text-gray-600 mt-2">Mahasiswa Penghuni</p>
                </div>
                <div class="bg-white p-6 rounded-lg shadow-md text-center">
                    <h3 class="text-4xl font-bold text-green-600">4</h3>
                    <p class="text-gray-600 mt-2">Gedung Asrama</p>
                </div>
                <div class="bg-white p-6 rounded-lg shadow-md text-center">
                    <h3 class="text-4xl font-bold text-green-600">100+</h3>
                    <p class="text-gray-600 mt-2">Kamar Tersedia</p>
                </div>
                <div class="bg-white p-6 rounded-lg shadow-md text-center">
                    <h3 class="text-4xl font-bold text-green-600">24</h3>
                    <p class="text-gray-600 mt-2">Jam Pengawasan</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Fasilitas Unggulan Section -->
    <section class="py-16">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-12">
                <h2 class="text-3xl font-bold text-gray-900">Fasilitas Unggulan</h2>
                <p class="mt-4 text-gray-600">Berbagai fasilitas modern untuk menunjang kehidupan asrama yang nyaman</p>
            </div>
            
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <!-- Fasilitas Item -->
                @foreach($fasilitas as $item)
                <div class="bg-white rounded-lg shadow-md overflow-hidden">
                    <img src="{{ asset('storage/' . $item->gambar) }}" alt="{{ $item->nama }}" class="w-full h-48 object-cover">
                    <div class="p-6">
                        <h3 class="font-semibold text-xl mb-2">{{ $item->nama }}</h3>
                        <p class="text-gray-600">{{ $item->deskripsi }}</p>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section>

    <!-- CTA Section -->
    <section class="py-16 bg-green-600">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
            <h2 class="text-3xl font-bold text-white mb-8">Bergabunglah dengan Komunitas Kami</h2>
            <p class="text-white mb-8 max-w-3xl mx-auto">Nikmati pengalaman tinggal di asrama dengan fasilitas modern dan komunitas yang mendukung pengembangan akademik dan sosial Anda.</p>
            
        </div>
    </section>

    <!-- Testimoni Section -->
    @include('partials.testimonials')

    <!-- Galeri Section -->
    <section class="py-16">
    <div>
    <h2 class="text-3xl font-bold text-gray-900">Galeri Asrama</h2>
    <p class="mt-4 text-gray-600">Lihat suasana dan kegiatan di asrama kami.</p>

    <div class="grid grid-cols-2 md:grid-cols-4 gap-4">
        @foreach($galeri as $gallery)
        
            <div class="relative overflow-hidden rounded-lg group">
                <img src="{{ asset('storage/' . $gallery->image) }}" 
                     alt="{{ $gallery->title }}" 
                     class="w-full h-48 object-cover transition-transform duration-300 group-hover:scale-110">
                <div class="absolute inset-0 bg-black bg-opacity-40 opacity-0 group-hover:opacity-100 transition-opacity duration-300 flex items-center justify-center">
                    <div class="text-center text-white p-4">
                        <h3 class="font-semibold">{{ $gallery->title }}</h3>
                        <p class="text-sm">{{ $gallery->description }}</p>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>
            
            <div class="text-center mt-8">
                <a href="" class="text-green-600 font-semibold hover:text-green-700">
                    Lihat Semua Foto →
                </a>
            </div>
        </div>
    </section>

@endsection