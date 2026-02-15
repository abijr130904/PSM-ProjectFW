@extends('layouts.app')

@section('content')

<section class="pt-32 pb-20 bg-linear-to-r from-emerald-700 to-green-500 text-white text-center">
    <h1 class="text-4xl md:text-5xl font-bold">Program Kerja</h1>
    <p class="mt-6 text-lg">Rangkaian kegiatan UKM PSM Polije</p>
</section>

<section class="py-20 bg-gray-50">
    <div class="max-w-7xl mx-auto px-6">

        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-8">

            @foreach($programs as $program)
                <div class="bg-white rounded-xl shadow hover:shadow-lg transition transform hover:-translate-y-1">

                    <img src="{{ asset('storage/'.$program->image) }}"
                         class="rounded-t-xl w-full h-56 object-cover">

                    <div class="p-6">
                        <h3 class="font-bold text-lg">
                            {{ $program->title }}
                        </h3>
                        <p class="text-gray-600 mt-3 text-sm">
                            {{ $program->description }}
                        </p>
                    </div>

                </div>
            @endforeach

        </div>

    </div>
</section>

@endsection
