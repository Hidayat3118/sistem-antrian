@extends('komponen.app')

@section('content')
    {{-- Header Include --}}
    @include('komponen.header')


    <div class="bg-gradient-to-b from-blue-50 to-blue-100 min-h-screen py-10">
        {{-- Tanggal wan waktu --}}
        <div class="flex justify-end container mx-auto">
            <div class="bg-white p-3 rounded-lg shadow-md flex items-center space-x-3 text-gray-600">
                <i class="far fa-calendar-alt text-blue-600 text-lg"></i>
                <span id="current-date" class="font-semibold text-lg"></span>
                <span class="text-sm text-gray-500 font-bold">-</span>
                <span id="current-time" class="text-gray-600 font-bold"></span>
            </div>
        </div>


        <div class="text-center mt-16">
            <h1 class="text-5xl font-extrabold text-blue-800 flex items-center justify-center">
                Selamat Datang
                <i class="fas fa-hands-helping text-yellow-400 ml-2"></i>
            </h1>
            <h2 class="text-3xl font-semibold text-gray-600 mt-4">Silahkan Pilih Jenis Antrian :</h2>
            <p class="text-lg text-gray-500 mt-2">Kami siap membantu Anda dengan layanan terbaik.</p>
        </div>

        <div class="flex gap-16 mt-16 justify-center ">
            {{-- Tombol umum --}}
            <a href="/antrianUmum">
                <button
                    class="text-4xl font-semibold text-white bg-green-600 hover:bg-green-700 py-5 px-14 rounded-xl shadow-lg flex items-center justify-center h-20 transform transition duration-300 hover:scale-110">
                    <i class="fas fa-user-friends mr-3"></i> UMUM
                </button></a>

            {{-- Tombol Pioritas --}}
            <div class="text-center">
                <a href="/antrianPrioritas">
                    <button
                        class="text-4xl font-semibold text-white bg-red-500 hover:bg-red-600 py-5 px-14 rounded-xl shadow-lg flex items-center justify-center h-20 transform transition duration-300 hover:scale-110">
                        <i class="fas fa-star mr-3"></i> PRIORITAS
                    </button></a>

                {{-- Tulisan Pioritas --}}
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
