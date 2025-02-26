@extends('komponen.app')

@section('content')
    {{-- Header Include --}}
    @include('komponen.header')

    <div class=" relative min-h-screen flex flex-col items-center justify-center bg-cover bg-center font-roboto"  style="background-image: url('../img/kuin.jpg');">
        {{-- Tanggal dan waktu --}}
        <div class="absolute top-6 right-10">
            <div class="bg-white p-3 rounded-lg shadow-md flex items-center space-x-3 text-gray-600">
                <i class="far fa-calendar-alt text-blue-600 text-lg"></i>
                <span id="current-date" class="font-semibold text-lg"></span>
                <span class="text-sm text-gray-500 font-bold">-</span>
                <span id="current-time" class="text-gray-600 font-bold"></span>
            </div>
        </div>

        {{-- Judul --}}
        <div class="text-center">
            <div class="bg-white opacity-85 px-6 py-4 inline-block rounded-lg shadow-md border border-slate-300">
                <h2 class="text-4xl font-bold text-gray-700 flex items-center justify-center">
                    Selamat Datang Di Puskesmas Kuin Raya
                </h2>
                <h2 class="text-3xl mt-6 font-semibold text-gray-700 flex items-center justify-center">
                    <i class="fas fa-list-alt text-blue-600 mr-2"></i> Silahkan Pilih Jenis Antrian
                </h2>
                <p class="text-lg mt-2">Kami siap membantu Anda dengan layanan terbaik.</p>
            </div>
           
        </div>

        {{-- Tombol Pilihan --}}
        <div class="flex gap-16 mt-10 bg-white opacity-85">
            {{-- Tombol Umum --}}
            <a href="/umum/cluster">
                <button
                    class="text-4xl font-semibold text-white bg-green-500 border-4 border-white py-5 px-14 rounded-xl shadow-lg flex items-center justify-center h-20 transform hover:bg-green-600">
                    <div class="w-12 h-12 flex items-center justify-center rounded-full bg-white mr-3 text-green-500">
                        <i class="fas fa-user-friends text-2xl"></i>
                    </div>
                    UMUM
                </button>
            </a>

            {{-- Tombol Prioritas --}}
            <div class="flex flex-col items-center">
                <a href="/prioritas/cluster">
                    <button
                        class="text-4xl font-semibold text-white bg-red-500 border-4 border-white py-5 px-14 rounded-xl shadow-lg flex items-center justify-center h-20 hover:bg-red-600">
                        <div class="w-12 h-12 flex items-center justify-center rounded-full bg-white mr-3 text-red-500  ">
                            <i class="fas fa-star"></i>
                        </div>
                        PRIORITAS
                    </button>
                </a>

                {{-- Tulisan Prioritas --}}
                <div class=" shadow-md rounded-lg mt-6 p-6 text-gray-600 space-y-4 w-full text-center 00">
                    <div class="flex items-center justify-center space-x-2">
                        <i class="fas fa-user-shield text-red-500"></i>
                        <p class="font-medium">Usia di atas 65 tahun</p>
                    </div>
                    <div class="flex items-center justify-center space-x-2">
                        <i class="fas fa-heartbeat text-red-500"></i>
                        <p class="font-medium">Disabilitas</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="{{ asset('js/home.js') }}"></script>
@endsection
