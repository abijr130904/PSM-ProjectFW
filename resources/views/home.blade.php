@extends('layouts.app')

@section('content')

<section class="bg-linear-to-r from-emerald-800 to-green-600 text-white pt-32 pb-24">
    <div class="max-w-7xl mx-auto px-6 text-center">
        <h1 class="text-4xl md:text-6xl font-bold">
            UKM Paduan Suara Polije
        </h1>
        <p class="mt-6 text-lg">
            Harmoni • Kreativitas • Prestasi
        </p>
    </div>
</section>

{{-- Artikel Preview --}}
<section class="py-20 bg-gray-50">
    <div class="max-w-7xl mx-auto px-6">
        <h2 class="text-3xl font-bold mb-10">Artikel Terbaru</h2>

        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-6">
            @foreach($articles as $article)
                <div class="bg-white rounded-xl shadow hover:shadow-lg transition">
                    <img src="{{ asset('storage/'.$article->thumbnail) }}"
                         class="rounded-t-xl w-full h-64 object-cover">
                    <div class="p-4">
                        <h3 class="font-semibold text-lg">
                            {{ $article->title }}
                        </h3>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>

@endsection
