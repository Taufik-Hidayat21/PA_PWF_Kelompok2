@extends('layouts.app')

@section('content')
<div class="max-w-4xl mx-auto pt-20">
    @include('partials.breadcrumb', ['title' => 'Visi'])

    <!-- Visi Section -->
    <div class="bg-white rounded-lg shadow-md p-8 mb-8">
        <h2 class="text-3xl font-bold text-gray-800 mb-6">Visi</h2>
        <div class="prose max-w-none">
            <p class="text-gray-600">{{ $visi }}</p>
        </div>
    </div>

</div>
@endsection