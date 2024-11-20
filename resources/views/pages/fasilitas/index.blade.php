@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4 pt-24 pb-8"> <!-- Changed py-8 to pt-24 pb-8 to add more top padding -->
    <!-- Header Section -->
    <div class="text-center mb-12">
        <h1 class="text-3xl font-bold text-gray-800 mb-3">Fasilitas Asrama</h1>
        <p class="text-gray-600 max-w-2xl mx-auto">
            Berbagai fasilitas yang tersedia di Asrama UNMUL untuk menunjang kenyamanan dan produktivitas mahasiswa.
        </p>
    </div>

    <!-- Rest of the code remains the same -->
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
        @forelse($fasilitas as $facility)
        <div class="bg-white rounded-xl shadow-sm overflow-hidden border border-gray-100 hover:shadow-md transition-all duration-300">
            <div class="relative">
                <img src="{{ asset('storage/' . $facility->gambar) }}" 
                     alt="{{ $facility->nama }}" 
                     class="w-full h-52 object-cover">
                <span class="absolute top-3 right-3 bg-white/90 px-3 py-1 rounded-full text-sm font-medium text-gray-700">
                    {{ $facility->nama }}
                </span>
            </div>
            <div class="p-5">
                <h3 class="text-xl font-semibold text-gray-800 mb-2">{{ $facility->nama }}</h3>
                <p class="text-gray-600 mb-4 text-sm line-clamp-2">{{ $facility->deskripsi }}</p>
            </div>
        </div>
        @empty
        <div class="col-span-full text-center py-10">
            <div class="text-gray-500">Tidak ada fasilitas yang dfacilityukan</div>
        </div>
        @endforelse
    </div>

    <!-- Pagination -->
    @if($fasilitas->hasPages())
    <div class="mt-10 flex justify-center">
        {{ $fasilitas->appends(request()->query())->onEachSide(1)->links() }}
    </div>
    @endif
</div>

<!-- Floating Back to Top Button -->
<button id="backToTop" 
        class="fixed bottom-6 right-6 bg-[#0D6EFD] text-white rounded-full p-3 hidden hover:bg-[#0B5ED7] transition-all shadow-lg">
    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 10l7-7m0 0l7 7m-7-7v18"/>
    </svg>
</button>

@push('scripts')
<script>
    // Back to Top Button
    const backToTop = document.getElementById('backToTop');
    
    window.onscroll = function() {
        if (document.body.scrollTop > 200 || document.documentElement.scrollTop > 200) {
            backToTop.classList.remove('hidden');
        } else {
            backToTop.classList.add('hidden');
        }
    };

    backToTop.addEventListener('click', function() {
        window.scrollTo({ top: 0, behavior: 'smooth' });
    });
</script>
@endpush
@endsection