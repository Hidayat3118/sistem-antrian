@extends('komponen.app')

@section('content')
    {{-- Header Include --}}
    @include('komponen.header')

    <main class="bg-gradient-to-b from-blue-50 to-blue-100 min-h-screen py-10">
        {{-- Tanggal --}}
        <div class="flex justify-end container mx-auto">
            <div class="bg-white p-3 rounded-lg shadow-md flex items-center space-x-3 text-gray-600">
                <i class="far fa-calendar-alt text-blue-600 text-lg"></i>
                <span class="font-semibold text-lg">Senin, 14 Oktober 2024</span>
                <span class="text-sm text-gray-500">-</span>
                <span class="text-gray-600">08:30</span>
            </div>
        </div>
    
        {{-- Card Antrian --}}
        <div class="container mx-auto flex justify-center mt-16">
            <div class="bg-white rounded-xl shadow-xl p-10 max-w-lg w-full  transition-transform duration-300 hover:shadow-2xl hover:scale-105 border">
                {{-- Header Antrian --}}
                <h3 class="text-3xl font-bold text-red-500 mb-4 text-center ">Antrian Prioritas</h3>
                
                {{-- Informasi Antrian --}}
                <div class="text-center">
                    <h2 class="text-4xl font-extrabold text-blue-800">No Antrian Anda</h2>
                    <h1 class="text-6xl font-semibold text-green-500 mt-4 border-b-4 border-green-400 inline-block pb-2">B009</h1>
                    <h5 class="mt-6 text-xl font-medium text-gray-800">Sisa Antrian: <span class="text-red-500 font-semibold">5</span></h5>
                    <p class="mt-4 text-gray-500">No Antrian berlaku sesuai tanggal yang diterbitkan</p>
                </div>
    
                {{-- Tombol Cetak --}}
                <div class="flex mt-10 justify-center">
                    <button
                        class="text-2xl font-semibold text-white bg-red-500 hover:bg-red-600 py-3 px-8 rounded-lg shadow-lg flex items-center transition duration-300 transform hover:scale-105">
                        <i class="fas fa-print mr-3"></i> CETAK
                    </button>
                </div>
            </div>
        </div>
    </main>
    
    
@endsection
