@extends('layouts.app')

@section('content')

<section class="pt-32 pb-20 bg-linear-to-r from-emerald-800 to-green-600 text-white text-center">
    <h1 class="text-4xl md:text-5xl font-bold">Struktur Organisasi</h1>
    <p class="mt-6 text-lg">Pengurus UKM PSM Polije</p>
</section>

<section class="py-20 bg-white">
    <div class="max-w-7xl mx-auto px-6">

        <div class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 gap-10">

            @foreach($members as $member)
                <div class="text-center">

                    <img src="{{ asset('storage/'.$member->photo) }}"
                         class="w-32 h-32 md:w-40 md:h-40 mx-auto rounded-full object-cover shadow-lg">

                    <h3 class="mt-4 font-semibold text-lg">
                        {{ $member->name }}
                    </h3>

                    <p class="text-sm text-gray-500">
                        {{ $member->position }}
                    </p>

                </div>
            @endforeach

        </div>

    </div>
</section>

@endsection
