@extends('komponen.app')

@section('content')
    {{-- Header Include --}}
    @include('komponen.header')


    <div class="bg-gradient-to-b from-blue-50 to-blue-100 min-h-screen py-10">
        <!-- Bagian Tanggal dan Waktu -->
        <div class="flex justify-end  container mx-auto">
            <div class="bg-white p-3 rounded-lg shadow-md flex items-center space-x-3 text-gray-600">
                <i class="far fa-calendar-alt text-blue-600 text-lg"></i>
                <span class="font-semibold text-lg">Senin, 14 Oktober 2024</span>
                <span class="text-sm text-gray-500">-</span>
                <span class="text-gray-600">08:30</span>
            </div>
        </div>
    
        <!-- Bagian No Antrian -->
        <div class="text-center mt-16">
            <h2 class="text-5xl font-bold text-blue-800 mt-14">No Antrian Anda</h2>
            <h1 class="text-6xl font-semibold text-green-600 mt-6 border-b-4 border-green-400 inline-block pb-2">A009</h1>
            <h5 class="mt-6 text-2xl font-semibold text-gray-800">Sisa Antrian : <span class="text-red-500">5</span></h5>
            <h6 class="mt-4 text-gray-600">No Antrian berlaku sesuai tanggal yang diterbitkan</h6>
        </div>
    
        <!-- Tombol Cetak -->
        <div class="flex mt-16 justify-center">
            <button
                class="text-4xl font-semibold text-white bg-green-600 hover:bg-green-700 py-5 px-14 rounded-xl shadow-lg flex items-center justify-center h-20 transform transition-transform duration-300 hover:scale-110">
                <i class="fas fa-print mr-3"></i> CETAK
            </button>
        </div>
    </div>
    


@endsection
