@extends('komponen.app')

@section('content')
    {{-- Header Include --}}
    @include('komponen.header')
    <div class="">
    
        <div class="flex items-center gap-3 mb-6 text-3xl font-bold text-gray-700 justify-center mt-12">
            <div class="border-2 border-gray-500 px-4 py-2 rounded-lg">
                <i class="fa-solid fa-list-check text-blue-500"></i>
                <span>Pilih Cluster Layanan</span>
            </div>
        </div>
        <div class="bg-white p-8 rounded-xl shadow-lg w-full max-w-4xl mx-auto text-center mt-44">
            <div class="flex justify-center gap-4">
                <button
                    class="flex items-center gap-2 px-8 py-4 bg-blue-500 text-white rounded-lg border-2 border-blue-700 hover:bg-blue-600 transition text-lg">
                    <span class="w-10 h-10 flex items-center justify-center bg-white text-blue-500 rounded-full border border-blue-700">
                        <i class="fa-solid fa-child"></i>
                    </span>
                    Cluster 2 (Anak-anak)
                </button>
                <button
                    class="flex items-center gap-2 px-8 py-4 bg-green-500 text-white rounded-lg border-2 border-green-700 hover:bg-green-600 transition text-lg">
                    <span class="w-10 h-10 flex items-center justify-center bg-white text-green-500 rounded-full border border-green-700">
                        <i class="fa-solid fa-user"></i>
                    </span>
                    Cluster 3 (Orang Tua)
                </button>
                <button
                    class="flex items-center gap-2 px-8 py-4 bg-red-500 text-white rounded-lg border-2 border-red-700 hover:bg-red-600 transition text-lg">
                    <span class="w-10 h-10 flex items-center justify-center bg-white text-red-500 rounded-full border border-red-700">
                        <i class="fa-solid fa-tooth"></i>
                    </span>
                    Cluster Gigi
                </button>
            </div>
        </div>

    </div>
@endsection