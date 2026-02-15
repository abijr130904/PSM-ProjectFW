@extends('layouts.app')

@section('content')

<section class="pt-32 pb-20 bg-linear-to-r from-emerald-800 to-green-600 text-white">
    <div class="max-w-5xl mx-auto px-6 text-center">
        <h1 class="text-4xl md:text-5xl font-bold">Tentang UKM PSM Polije</h1>
        <p class="mt-6 text-lg md:text-xl text-gray-100">
            Harmoni dalam keberagaman, prestasi dalam kebersamaan.
        </p>
    </div>
</section>

<section class="py-20 bg-white">
    <div class="max-w-6xl mx-auto px-6 grid md:grid-cols-2 gap-12 items-center">

        <div>
            <h2 class="text-3xl font-bold mb-6">Sejarah Singkat</h2>
            <p class="text-gray-600 leading-relaxed">
                UKM Paduan Suara Polije merupakan wadah pengembangan bakat
                mahasiswa dalam bidang seni musik, khususnya paduan suara.
                Organisasi ini berdiri sebagai ruang kreativitas,
                kebersamaan, dan pembinaan karakter mahasiswa.
            </p>
        </div>

        <div class="bg-emerald-100 h-80 rounded-xl"></div>

    </div>
</section>

<section class="py-20 bg-gray-50">
    <div class="max-w-6xl mx-auto px-6 grid md:grid-cols-2 gap-12">

        <div>
            <h3 class="text-2xl font-bold mb-4 text-emerald-700">Visi</h3>
            <p class="text-gray-600">
                Menjadi UKM seni yang unggul, berprestasi, dan berkarakter.
            </p>
        </div>

        <div>
            <h3 class="text-2xl font-bold mb-4 text-emerald-700">Misi</h3>
            <ul class="list-disc pl-5 text-gray-600 space-y-2">
                <li>Mengembangkan bakat mahasiswa di bidang musik.</li>
                <li>Meningkatkan solidaritas dan kerja sama tim.</li>
                <li>Berpartisipasi dalam kompetisi dan event seni.</li>
            </ul>
        </div>

    </div>
</section>

@endsection
