@extends('layouts.app')

@section('content')
<div class="max-w-4xl mx-auto pt-20">
    @include('partials.breadcrumb', ['title' => 'Misi'])

    <!-- Misi Section -->
    <div class="bg-white rounded-lg shadow-md p-8 mb-8">
        <h2 class="text-3xl font-bold text-gray-800 mb-6">Misi</h2>
        <ul class="space-y-4">
            @foreach($misi as $item)
            <li class="flex items-start">
                <div class="flex-shrink-0 w-8 h-8 flex items-center justify-center bg-blue-600 rounded-full text-white font-bold">
                    {{ $loop->iteration }}
                </div>
                <div class="ml-4">
                    <p class="text-gray-600">{{ $item }}</p>
                </div>
            </li>
            @endforeach
        </ul>
    </div>
</div>
@endsection