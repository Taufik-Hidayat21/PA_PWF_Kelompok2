<section class="relative bg-gray-900 h-screen flex items-center">
    <!-- Background Image -->
    <div class="absolute inset-0">
        <img src="{{ asset('images/asrama/gedung.png') }}" alt="Asrama Unmul" class="w-full h-full object-cover">
        <div class="absolute inset-0 bg-black opacity-50"></div>
    </div>

    <!-- Content -->
    <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
        <h1 class="text-4xl md:text-6xl font-bold text-white mb-6">
            Asrama Universitas Mulawarman
        </h1>
        <p class="text-xl text-white mb-8 max-w-3xl mx-auto">
            Tempat tinggal nyaman dengan fasilitas modern untuk mendukung prestasi akademik mahasiswa Universitas Mulawarman
        </p>
        <div class="space-x-4">
            <a href="{{ route('about.index') }}" 
               class="inline-block bg-white text-gray-900 px-8 py-3 rounded-lg font-semibold hover:bg-gray-100 transition-colors">
                Pelajari Lebih Lanjut
            </a>
        </div>
    </div>
</section>