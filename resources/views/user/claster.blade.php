@extends('komponen.app')

@section('content')
    {{-- Header Include --}}
    @include('komponen.header')

    <div class="">

        {{-- Judul --}}
        <div class="text-center mt-40">
            <div class="bg-white px-6 py-4 inline-block rounded-lg shadow-md border border-slate-300">
                <h2 class="text-3xl font-semibold text-gray-700 flex items-center justify-center">
                    <i class="fas fa-list-alt text-blue-600 mr-2"></i> Silahkan Pilih Cluster Anda
                </h2>
            </div>
            <p class="text-lg text-gray-500 mt-2">Kami siap membantu Anda dengan layanan terbaik.</p>
        </div>

        {{-- Kotak Pilihan Cluster --}}
        <div class="bg-white p-8 rounded-xl shadow-lg w-full max-w-4xl mx-auto text-center mt-12">
            <div class="flex justify-center gap-4">
                {{-- Tombol Cluster 2 (Anak-anak) --}}
                <button
                    class="flex items-center gap-4 px-8 py-4 text-blue-600 border-4 border-blue-600 rounded-xl shadow-lg  hover:bg-blue-600 hover:text-white">
                    <div class="w-12 h-12 flex items-center justify-center rounded-full bg-blue-600 text-white">
                        <i class="fa-solid fa-child"></i>
                    </div>
                    Cluster 2 (Anak-anak)
                </button>

                {{-- Tombol Cluster 3 (Orang Tua) --}}
                <button
                    class="flex items-center gap-4 px-8 py-4 text-green-600 border-4 border-green-600 rounded-xl shadow-lg  hover:bg-green-600 hover:text-white">
                    <div class="w-12 h-12 flex items-center justify-center rounded-full bg-green-600 text-white">
                        <i class="fa-solid fa-user"></i>
                    </div>
                    Cluster 3 (Orang Tua)
                </button>

                {{-- Tombol Cluster Gigi --}}
                <button
                    class="flex items-center gap-4 px-8 py-4 text-red-600 border-4 border-red-600 rounded-xl shadow-lg  hover:bg-red-600 hover:text-white">
                    <div class="w-12 h-12 flex items-center justify-center rounded-full bg-red-600 text-white">
                        <i class="fa-solid fa-tooth"></i>
                    </div>
                    Cluster Gigi
                </button>
            </div>
        </div>

    </div>
@endsection
