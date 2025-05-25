@extends('komponen.app')

@section('content')

    {{-- Header Include --}}
    @include('komponen.header')
    

    <main class=" mx-auto flex my-auto  justify-center items-center min-h-screen ">
       
        <div class="bg-gradient-to-r from-blue-100 to-indigo-100 border mt-32 rounded-xl mx-auto w-full container">
            <div class="flex flex-wrap  py-10 justify-around ">
                
                <!-- Konten 1 -->
                <div class="w-full md:w-1/2 lg:w-2/5">
                    <div class="bg-blue-50 p-8 rounded-lg shadow-lg">
                        <h2 class="text-center text-3xl font-bold text-gray-700">
                            <i class="fas fa-users text-blue-500 mr-4"></i>Sisa Antrian
                        </h2>
                        <div class="flex bg-blue-100 gap-4 p-6 rounded-md mt-8 justify-center">
                            <h2 class="text-gray-700 text-2xl">
                                <i class="fas fa-user text-green-500 mr-3"></i>Umum(A): 
                                <span class="font-semibold text-red-500"></span>
                            </h2>
                            <h2 class="text-gray-700 text-2xl">
                                <i class="fas fa-user-shield text-orange-500 mr-3"></i>Prioritas(B): 
                                <span class="font-semibold text-red-500"></span>
                            </h2>
                        </div>
                    </div>
                    <div class="w-full max-w-3xl mx-auto">
                        @if ($video)
                            <div class="relative w-full pt-[56.25%] mt-8 bg-blue-50 border border-gray-300 shadow-lg rounded-lg overflow-hidden">
                                <video class="absolute top-0 left-0 w-full h-full" controls autoplay>
                                    <source src="{{ asset('storage/'.$video->file_path) }}" type="video/mp4">
                                    Browser Anda tidak mendukung pemutaran video.
                                </video>
                            </div>
                        @else
                           
                        <div class="w-full h-96 rounded-lg bg-blue-50 mt-8 border border-gray-300 flex flex-col items-center justify-center text-gray-600 shadow-lg">
                            <p class="text-center text-gray-600 font-bold">Tidak ada video yang di tampilkan.</p>
                            <div class="flex items-center mt-4">
                                <i class="fas fa-clipboard-list text-7xl"></i>
                                <span class="ml-5 text-3xl font-semibold">Konten</span>
                            </div>
                        </div>
                        
                        @endif
                    </div>
                    
                </div>
    
                <!-- Konten 2 -->
                <div class="w-full md:w-1/2 lg:w-2/5  flex justify-center">
                    <div class="font-bold">
                        <div class="flex items-center text-blue-500 space-x-4 mb-14">
                            <i class="fas fa-clock text-3xl"></i>
                            <span class="text-gray-600 text-2xl">Waktu Operasional: 08:00 - 17:00</span>
                        </div>
                        <!-- Loket 1 -->
                        <div class="flex items-center justify-center mb-12 text-gray-700">
                            <i class="fas fa-desktop text-blue-500 text-6xl mr-4"></i>
                            <span class="text-3xl">Loket 1</span>
                        </div>
                        <div class="flex gap-4 text-white mb-12">
                            <div class="bg-green-400 w-full md:w-48 h-24 rounded-lg flex items-center justify-center shadow-lg text-3xl">{{ $umum ? $umum->nomor_antrian : 'kosong' }}</div>
                        </div>
    
                        <!-- Loket 2 -->
                        <div class="flex items-center justify-center mb-12 text-gray-700">
                            <i class="fas fa-desktop text-blue-500 text-6xl mr-4"></i>
                            <span class="text-3xl">Loket 2</span>
                        </div>
                        <div class="flex gap-4 text-white">
                            <div class="bg-green-400 w-full md:w-48 h-24 rounded-lg flex items-center justify-center shadow-lg text-3xl">{{ $prioritas ? $prioritas->nomor_antrian : 'kosong' }}</div>                        
                        </div>
                    </div>
                </div>
                
            </div>
        </div>
    </main>
    
    
    
@endsection




