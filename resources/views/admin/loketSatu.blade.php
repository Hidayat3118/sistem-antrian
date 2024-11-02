@extends('komponen.app')

@section('content')
    <div class="flex">
        @include('komponen.sidebar')


        <main class="container flex flex-col justify-center  ">
            {{-- Judul --}}

            <div class="flex   space-x-3 container mx-auto -mt-32 pl-16 lg:pl-24 xl:pl-32  xl:text-4xl text-3xl ">
                <!-- Ikon antrian menggunakan Font Awesome -->
                <i class="fas fa-users text-blue-500 "></i>
                <h1 class=" font-bold">Menu Antrian Loket 1</h1>
            </div>

            <div class="flex justify-center gap-12 mt-24 mx-auto b">
                {{-- Kotak Antiran Umum --}}
                <div class="bg-gray-100 text-center p-8 rounded-xl shadow-lg space-y-6 xl:max-w-xl lg:max-w-lg max-w-md transition-transform duration-300 hover:shadow-2xl hover:scale-105 border border-gray-200">
                    <h2 class="text-6xl font-bold text-gray-800">Umum</h2>
                
                    {{-- Kartu Prioritas --}}
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
                    <div class="flex justify-center space-x-2">
                        <button
                            class="bg-green-500 hover:bg-green-600 py-2 px-3 lg:py-3 lg:px-3  rounded-lg text-white font-bold flex items-center space-x-2 shadow-lg transition-transform duration-300 hover:shadow-2xl hover:scale-105 border border-gray-200">
                            <i class="fas fa-bullhorn"></i>
                            <span class="text-xs md:text-sm lg:text-base">Panggil/Ulangi</span>
                        </button>
                
                        <button
                            class="bg-green-500 hover:bg-green-600 py-2 px-3 lg:py-3 lg:px-3 rounded-lg text-white font-bold flex items-center space-x-2 shadow-lg transition-transform duration-300 hover:shadow-2xl hover:scale-105 border border-gray-200">
                            <i class="fas fa-check-circle"></i>
                            <span class="text-xs md:text-sm lg:text-base">Selesai</span>
                        </button>
                
                        <button
                            class="bg-green-500 hover:bg-green-600 py-2 px-3 lg:py-3 lg:px-3 rounded-lg text-white font-bold flex items-center space-x-2 shadow-lg transition-transform duration-300 hover:shadow-2xl hover:scale-105 border border-gray-200">
                            <span class="text-xs md:text-sm lg:text-base">Selanjutnya</span>
                            <i class="fas fa-arrow-right mt-1"></i>
                        </button>
                    </div>
                </div>
                

            </div>
        </main>
    </div>
@endsection
