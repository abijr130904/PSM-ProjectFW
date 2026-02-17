@extends('layouts.app')

@section('content')

<section class="pt-28 pb-20 bg-gradient-to-r from-blue-950 to-blue-700 text-white text-center">
    <h1 class="text-4xl md:text-5xl font-bold">Program Kerja</h1>
    <p class="mt-5 text-blue-200">Rangkaian kegiatan UKM PSM Polije</p>
</section>

<section class="py-20 bg-white">
    <div class="max-w-7xl mx-auto px-6">

        {{-- FILTER PAGINATION --}}
        <div class="flex justify-between items-center mb-10">
            <form method="GET">
                <select name="perPage" onchange="this.form.submit()"
                        class="border border-blue-200 px-3 py-2 text-sm">
                    @foreach([5,10,25,50,'all'] as $size)
                        <option value="{{ $size }}"
                            {{ $perPage == $size ? 'selected' : '' }}>
                            {{ $size == 'all' ? 'All' : $size }}
                        </option>
                    @endforeach
                </select>
            </form>
        </div>

        @if($programs->isEmpty())

        <div class="text-center py-20">
            <h2 class="text-xl font-semibold text-blue-900">
                Program belum tersedia.
            </h2>
        </div>

        @else

        <div class="grid md:grid-cols-3 gap-10 animate-fade">

            @foreach($programs as $program)
            <div class="border border-blue-100 hover:shadow-lg transition duration-300">

                <img loading="lazy" decoding="async"
                     src="{{ $program->image ? asset('storage/'.$program->image) : 'https://via.placeholder.com/600x400' }}"
                     class="w-full h-48 object-cover">

                <div class="p-6">
                    <h3 class="font-semibold text-blue-900">
                        {{ $program->title }}
                    </h3>

                    <p class="text-gray-600 text-sm mt-3">
                        {{ Str::limit($program->description, 120) }}
                    </p>
                </div>

            </div>
            @endforeach

        </div>

        {{-- PAGINATION LINKS --}}
        @if(method_exists($programs, 'links'))
        <div class="mt-16">
            {{ $programs->links() }}
        </div>
        @endif

        @endif

    </div>
</section>

@endsection

@push('styles')
<style>
.animate-fade {
    animation: fadeIn 0.5s ease-in-out;
}
@keyframes fadeIn {
    from { opacity:0; transform: translateY(10px); }
    to { opacity:1; transform: translateY(0); }
}
</style>
@endpush
