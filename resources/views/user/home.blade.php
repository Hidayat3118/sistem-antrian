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

    <!-- Bagian Judul dan Deskripsi -->
    <div class="text-center mt-16">
        <h1 class="text-5xl font-extrabold text-blue-800 flex items-center justify-center">
            <i class="fas fa-hands-helping text-yellow-400 mr-2"></i>
            Selamat Datang
        </h1>
        <h2 class="text-3xl font-semibold text-gray-600 mt-4">Silahkan Pilih Jenis Antrian :</h2>
        <p class="text-lg text-gray-500 mt-2">Kami siap membantu Anda dengan layanan terbaik.</p>
    </div>

    <!-- Tombol Pilihan Antrian -->
    <div class="flex gap-16 mt-16 justify-center ">
        <!-- Tombol UMUM -->
        <button
            class="text-4xl font-semibold text-white bg-green-600 hover:bg-green-700 py-5 px-14 rounded-xl shadow-lg flex items-center justify-center h-20 transform transition duration-300 hover:scale-110">
            <i class="fas fa-user-friends mr-3"></i> UMUM
        </button>

        <!-- Tombol PRIORITAS dengan Deskripsi -->
        <div class="text-center">
            <button
                class="text-4xl font-semibold text-white bg-red-500 hover:bg-red-600 py-5 px-14 rounded-xl shadow-lg flex items-center justify-center h-20 transform transition duration-300 hover:scale-110">
                <i class="fas fa-star mr-3"></i> PRIORITAS
            </button>

            <!-- Deskripsi Prioritas -->
            <div class="bg-white shadow-md rounded-lg mt-6 p-6 text-gray-600 space-y-4">
                <div class="flex items-center space-x-2">
                    <i class="fas fa-user-shield text-red-500"></i>
                    <p class="font-medium">Usia di atas 65 tahun</p>
                </div>
                <div class="flex items-center space-x-2">
                    <i class="fas fa-heartbeat text-red-500"></i>
                    <p class="font-medium">Ada riwayat penyakit</p>
                </div>
                <div class="flex items-center space-x-2">
                    <i class="fas fa-exclamation-triangle text-red-500"></i>
                    <p class="font-medium">Kondisi darurat</p>
                </div>
            </div>
        </div>
    </div>
</div>





  
@endsection