@extends('layouts.app')

@section('content')
<div class="max-w-4xl mx-auto pt-20">
    @include('partials.breadcrumb', ['title' => 'Sejarah'])
    <!-- Header Section -->
    <div class="text-center mb-12">
        <h1 class="text-4xl font-bold text-gray-800 mb-4">Sejarah Asrama UNMUL</h1>
        <p class="text-gray-600 max-w-2xl mx-auto">
            Perjalanan dan perkembangan Asrama Mahasiswa Universitas Mulawarman dari masa ke masa
        </p>
    </div>

    <!-- Timeline Section -->
    <div class="max-w-4xl mx-auto">
        <div class="relative wrap overflow-hidden p-10 h-full">
            <!-- Vertical line -->
            <div class="border-2-2 absolute border-gray-200 h-full border" style="left: 50%"></div>
            
            <!-- Display sejarah content -->
            <div class="mb-8 flex justify-between items-center w-full">
                <div class="order-1 w-5/12">
                    @if($about->sejarah_image)
                        <img src="{{ asset('storage/images/about/' . $about->sejarah_image) }}" 
                             alt="Sejarah Asrama UNMUL" 
                             class="rounded-lg w-full shadow-md">
                    @endif
                </div>
                <div class="z-20 flex items-center order-1 bg-blue-600 shadow-xl w-8 h-8 rounded-full">
                    <h1 class="mx-auto font-semibold text-lg text-white">1</h1>
                </div>
                <div class="order-1 bg-white rounded-lg shadow-md w-5/12 px-6 py-4">
                    <h3 class="mb-3 font-bold text-gray-800 text-xl">Sejarah Asrama</h3>
                    <div class="text-sm leading-snug tracking-wide text-gray-600 space-y-4">
                        {!! nl2br(e($about->sejarah)) !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection