@extends('layouts.app')

@section('title', 'Galeri Asrama')

@section('content')
<div class="container mx-auto px-4 py-40">
    <!-- Hero Section -->
    <div>
        <h2 class="text-3xl font-bold text-gray-900">Galeri Asrama</h2>
        <p class="mt-4 text-gray-600">Lihat suasana dan kegiatan di asrama kami.</p>

        @if($galeri->count() > 0)
            <div class="grid grid-cols-2 md:grid-cols-4 gap-4">
                @foreach($galeri as $gallery)
                    <div class="relative overflow-hidden rounded-lg group">
                        <img 
                            src="{{ asset('storage/' . $gallery->image) }}" 
                            alt="{{ $gallery->title }}" 
                            class="w-full h-48 object-cover transition-transform duration-300 group-hover:scale-110"
                        >
                        <div class="absolute inset-0 bg-black bg-opacity-40 opacity-0 group-hover:opacity-100 transition-opacity duration-300 flex items-center justify-center">
                            <div class="text-center text-white p-4">
                                <h3 class="font-semibold">{{ $gallery->title }}</h3>
                                <p class="text-sm">{{ $gallery->description }}</p>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

            <!-- Pagination -->
            @if($galeri->hasPages())
                <div class="mt-8">
                    {{ $galeri->links() }}
                </div>
            @endif
        @else
            <div class="text-center py-8">
                <p class="text-gray-500">Belum ada foto dalam galeri.</p>
            </div>
        @endif
    </div>
</div>
@endsection