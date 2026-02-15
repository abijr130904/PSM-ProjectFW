@extends('layouts.app')

@section('content')

<section class="pt-32 pb-20 bg-gray-50">
    <div class="max-w-6xl mx-auto px-6">

        <h1 class="text-3xl font-bold mb-10">Artikel</h1>

        <div class="grid md:grid-cols-3 gap-8">
            @foreach($articles as $article)
                <a href="{{ route('artikel.show', $article->slug) }}"
                   class="bg-white rounded-xl shadow p-4">

                    <img src="{{ asset('storage/'.$article->thumbnail) }}"
                         class="rounded-lg mb-4">

                    <h2 class="font-semibold">
                        {{ $article->title }}
                    </h2>
                </a>
            @endforeach
        </div>

    </div>
</section>

@endsection
