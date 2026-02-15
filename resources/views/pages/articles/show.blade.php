@extends('layouts.app')

@section('content')

<section class="pt-32 pb-20 bg-white">
    <div class="max-w-4xl mx-auto px-6">

        <h1 class="text-4xl font-bold mb-6">
            {{ $article->title }}
        </h1>

        <img src="{{ asset('storage/'.$article->thumbnail) }}"
             class="w-full rounded-xl mb-8">

        <div class="prose max-w-none">
            {!! $article->content !!}
        </div>

    </div>
</section>

@endsection
