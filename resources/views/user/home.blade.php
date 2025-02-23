@extends('komponen.app')

@section('content')
    {{-- Header Include --}}
    @include('komponen.header')

    <div class="bg-gradient-to-b from-blue-50 to-blue-100 min-h-screen py-10">
        {{-- Tanggal dan waktu --}}
        <div class="flex justify-end container mx-auto">
            <div class="bg-white p-3 rounded-lg shadow-md flex items-center space-x-3 text-gray-600">
                <i class="far fa-calendar-alt text-blue-600 text-lg"></i>
                <span id="current-date" class="font-semibold text-lg"></span>
                <span class="text-sm text-gray-500 font-bold">-</span>
                <span id="current-time" class="text-gray-600 font-bold"></span>
            </div>
        </div>

        <div class="text-center mt-16">
            <div class="bg-white px-6 py-4 inline-block rounded-lg shadow-md border border-slate-300">
                <h2 class="text-3xl font-semibold text-gray-700 flex items-center justify-center">
                    <i class="fas fa-list-alt text-blue-600 mr-2"></i> Silahkan Pilih Jenis Antrian
                </h2>
            </div>
            <p class="text-lg text-gray-500 mt-2">Kami siap membantu Anda dengan layanan terbaik.</p>
        </div>

        <div class="flex gap-16 mt-16 justify-center">
            {{-- Tombol Umum --}}
            <a href="/antrianUmum">
                <button
                    class="text-4xl font-semibold text-green-600 border-4 border-green-600 py-5 px-14 rounded-xl shadow-lg flex items-center justify-center h-20 transform  hover:bg-green-600 hover:text-white">
                    <div class="w-12 h-12 flex items-center justify-center rounded-full bg-green-600 text-white mr-3">
                        <i class="fas fa-user-friends"></i>
                    </div>
                    UMUM
                </button>
            </a>

            {{-- Tombol Prioritas --}}
            <div class="text-center">
                <a href="/antrianPrioritas">
                    <button
                        class="text-4xl font-semibold text-red-500 border-4 border-red-500 py-5 px-14 rounded-xl shadow-lg flex items-center justify-center h-20 transform  hover:bg-red-500 hover:text-white">
                        <div class="w-12 h-12 flex items-center justify-center rounded-full bg-red-500 text-white mr-3">
                            <i class="fas fa-star"></i>
                        </div>
                        PRIORITAS
                    </button>
                </a>

                {{-- Tulisan Prioritas --}}
                <div class="bg-white shadow-md rounded-lg mt-6 p-6 text-gray-600 space-y-4">
                    <div class="flex items-center space-x-2">
                        <i class="fas fa-user-shield text-red-500"></i>
                        <p class="font-medium">Usia di atas 65 tahun</p>
                    </div>
                    <div class="flex items-center space-x-2">
                        <i class="fas fa-heartbeat text-red-500"></i>
                        <p class="font-medium">Disabilitas</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="{{ asset('js/home.js') }}"></script>
@endsection
