{{-- resources/views/partials/testimonials.blade.php --}}

<section class="py-16 bg-white">
    <div class="container mx-auto px-4">
    <div>
    <h2 class="text-3xl font-bold text-gray-800 mb-4">Apa Kata Mereka?</h2>
    <p class="text-gray-600 max-w-2xl mx-auto">Dengarkan pengalaman langsung dari penghuni asrama kami.</p>

    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
        @foreach($testimonials as $testimonial)
            <div class="bg-gray-50 p-6 rounded-lg">
                <div class="flex items-center mb-4">
                    <img src="{{ asset($testimonial['image']) }}" alt="{{ $testimonial['name'] }}" class="w-12 h-12 rounded-full mr-4">
                    <div>
                        <h3 class="font-semibold text-gray-800">{{ $testimonial['name'] }}</h3>
                        <p class="text-gray-600 text-sm">{{ $testimonial['role'] }}</p>
                    </div>
                </div>
                <p class="text-gray-700">{{ $testimonial['message'] }}</p>
            </div>
        @endforeach
    </div>
</div>

        <!-- Navigation Buttons -->
        <div class="flex justify-center mt-8">
            <button class="mx-2 p-2 rounded-full bg-gray-200 hover:bg-gray-300 transition">
                <svg class="w-6 h-6 text-gray-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"/>
                </svg>
            </button>
            <button class="mx-2 p-2 rounded-full bg-gray-200 hover:bg-gray-300 transition">
                <svg class="w-6 h-6 text-gray-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                </svg>
            </button>
        </div>
    </div>
</section>