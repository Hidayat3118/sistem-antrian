@extends('komponen.app')

@section('content')
    {{-- Header Include --}}
    @include('komponen.header')

    <div class="relative min-h-screen flex flex-col items-center justify-center bg-cover bg-center"
        style="background-image: url('../img/dokter.jpg');">

        {{-- Overlay untuk membuat teks lebih terbaca --}}
        <div class="absolute inset-0 bg-blue-900 bg-opacity-50"></div>

        {{-- Judul --}}
        <div class="text-center relative z-10 mt-20">
            <div class="bg-white  px-6 py-4 inline-block rounded-lg shadow-lg border border-slate-300 bg-opacity-75">
                <h2 class="text-3xl font-semibold text-gray-700 flex items-center justify-center">
                    <i class="fas fa-list-alt text-blue-600 mr-2"></i> Silahkan Pilih Cluster Anda
                </h2>
            </div>
            <p class="text-lg text-gray-200 mt-2">Kami siap membantu Anda dengan layanan terbaik.</p>
        </div>

        {{-- Kotak Pilihan Cluster --}}
        <div
            class="bg-white p-8  rounded-xl shadow-xl w-full max-w-5xl mx-auto text-center mt-12 relative z-10 bg-opacity-75">
            <div class="flex justify-center gap-6">
                {{-- Tombol Cluster 2 (Anak-anak) --}}
                <a href="/antrian/{{ $jenis }}/anak">
                    <button type="button"
                        class="flex items-center gap-2 px-8 py-4 bg-blue-500 text-white border-4 border-white rounded-xl shadow-lg  hover:bg-blue-600 hover:text-white font-bold">
                        <div class="w-12 h-12 flex items-center justify-center rounded-full bg-white text-white">
                            <i class="fa-solid fa-child text-blue-500 text-2xl"></i>
                        </div>
                        Cluster 2 
                    </button>
                </a>

                {{-- Tombol Cluster 3 (Orang Tua) --}}
                <a href="/antrian/{{ $jenis }}/ortu">
                    <button
                        class="flex items-center gap-2 px-8 py-4 bg-green-500 border-4 border-white rounded-xl shadow-lg text-white font-bold hover:bg-green-600">
                        <div class="w-12 h-12 flex items-center justify-center rounded-full bg-white text-white">
                            <i class="fa-solid fa-user text-green-500"></i>
                        </div>
                        Cluster 3 
                    </button>
                </a>

                {{-- Tombol Cluster Gigi --}}
                <a href="/antrian/{{ $jenis }}/gigi">
                    <button
                        class="flex items-center gap-2 px-8 py-4 bg-red-500 border-white text-white font-bold border-4 border-red-600 rounded-xl shadow-lg hover:bg-red-600">
                        <div class="w-12 h-12 flex items-center justify-center rounded-full bg-white text-red-500">
                            <i class="fa-solid fa-tooth"></i>
                        </div>
                        Cluster Gigi
                    </button>
                </a>
            </div>
        </div>

    </div>
@endsection
