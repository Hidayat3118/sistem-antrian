@extends('komponen.app')

@section('content')
    {{-- Header Include --}}
    @include('komponen.header')

    <div class="flex">
        @include('komponen.sidebar')

        <main class="px-10 flex-grow">
            {{-- Judul --}}
            <div class="flex items-center space-x-3 container mx-auto mt-10">
                <!-- Ikon antrian menggunakan Font Awesome -->
                <i class="fas fa-users text-blue-500 text-4xl"></i>
                <h1 class="text-4xl font-bold">Menu Antrian Loket 1</h1>
            </div>

            <div class="flex justify-center items-center  mt-32">
                {{-- Card Box --}}
                <div
                    class="bg-gray-100 text-center p-8 max-w-2xl rounded-xl shadow-lg space-y-6 transition-transform duration-300 hover:shadow-2xl hover:scale-105 border border-gray-200">

                    <h2 class="text-6xl font-bold text-gray-800">Umum</h2>

                    {{-- Kartu Umum --}}
                    <div class="bg-green-500 border border-black rounded-xl p-6 text-white shadow-md">
                        <h1 class="text-8xl font-extrabold flex items-center justify-center space-x-2 text-gray-200">
                            <i class="fas fa-ticket-alt"></i>
                            <span>A009</span>
                        </h1>
                        <p class="mt-4 text-lg font-semibold">Status: <span class="font-light">Belum dipanggil</span></p>
                    </div>

                    {{-- Sisa Antrian --}}
                    <p class="text-3xl text-gray-700">Sisa Antrian: <span class="font-bold text-red-500">5</span></p>

                    {{-- Tombol Aksi --}}
                    <div class="flex justify-center space-x-4">
                        <button
                            class="bg-green-500 hover:bg-green-600 py-3 px-6 rounded-lg text-white font-bold flex items-center space-x-2 shadow-lg transition-transform duration-300 hover:shadow-2xl hover:scale-105 border border-gray-200">
                            <i class="fas fa-bullhorn"></i>
                            <span>Panggil/Ulangi</span>
                        </button>

                        <button
                            class="bg-green-500 hover:bg-green-600 py-3 px-6 rounded-lg text-white font-bold flex items-center space-x-2 shadow-lg transition-transform duration-300 hover:shadow-2xl hover:scale-105 border border-gray-200">
                            <i class="fas fa-check-circle"></i>
                            <span>Selesai</span>
                        </button>

                        <button
                            class="bg-green-500 hover:bg-green-600 py-3 px-6 rounded-lg text-white font-bold flex items-center space-x-2 shadow-lg transition-transform duration-300 hover:shadow-2xl hover:scale-105 border border-gray-200">
                            <span>Selanjutnya</span>
                            <i class="fas fa-arrow-right mt-1"></i>
                        </button>
                    </div>
                </div>
            </div>
        </main>
    </div>
@endsection
