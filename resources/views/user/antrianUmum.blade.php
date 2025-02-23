@extends('komponen.app')

@section('content')
    {{-- Header Include --}}
    @include('komponen.header')
    <script>
        updateDateTime();
    </script>

    <main class="bg-gradient-to-b from-blue-50 to-blue-100 min-h-screen py-10">
        {{-- Tanggal --}}
        <div class="flex justify-end container mx-auto">
            <div class="bg-white p-3 rounded-lg shadow-md flex items-center space-x-3 text-gray-600">
                <i class="far fa-calendar-alt text-blue-600 text-lg"></i>
                <span class="font-semibold text-lg">{{ $tanggal }}</span>
                <span class="text-sm text-gray-500">-</span>
                <span class="text-gray-600">{{ $waktu }}</span>
            </div>
        </div>

        {{-- Card Antrian --}}
        <form action="/simpanAntrian" method="POST">
            @csrf
            <div class="container mx-auto flex justify-center mt-16">
                <div class="bg-white rounded-xl shadow-xl p-10 max-w-lg w-full border">

                    <h3 class="text-3xl font-bold text-green-500 mb-4 text-center ">Umum</h3>
                    <div class="text-center">
                        <h2 class="text-4xl font-extrabold text-blue-800">No Antrian Anda</h2>
                        <h1
                            class="text-6xl font-semibold text-green-500 mt-4 border-b-4 border-green-400 inline-block pb-2">
                            {{ $antrian }}</h1>
                        <h5 class="mt-6 text-xl font-medium text-gray-800">Sisa Antrian: <span
                                class="text-red-500 font-semibold">{{ $sisaAntrian }}</span></h5>
                        <p class="mt-4 text-gray-500">No Antrian berlaku sesuai tanggal yang diterbitkan</p>
                        <input type="hidden" name="nomor_antrian" value="{{ $antrian }}">
                        <input type="hidden" name="tanggal" value="{{ $tanggal }}">
                        <input type="hidden" name="waktu" value="{{ $waktu }}">
                        <input type="hidden" name="isPriority" value="0">
                    </div>
                    {{-- deskripsi --}}

                    <div class="flex  justify-center items-center pt-6 gap-2">
                        <label for="no" class="text-lg font-semibold text-gray-700">No Telepon :</label>
                        <input type="number" id="no" name="no_telp"
                            class="w-52 border-2 border-slate-400 rounded-lg px-4 py-2 text-gray-700 bg-gray-50 focus:outline-none focus:ring-2 focus:ring-slate-400 placeholder-gray-400 shadow-sm"
                            placeholder="Opsional">
                    </div>
                    {{-- Ini yang hanyar di tambahi --}}
                    <div class="flex  justify-center items-center pt-6 gap-2">
                        <label for="no" class="text-lg font-semibold text-gray-700">Catatan :</label>
                        <input type="text" id="no" name="no_telp"
                            class="w-52 border-2 border-slate-400 rounded-lg px-4 py-2 text-gray-700 bg-gray-50 focus:outline-none focus:ring-2 focus:ring-slate-400 placeholder-gray-400 shadow-sm"
                            placeholder="Opsional">
                    </div>
                    <div class="flex mt-10 justify-center">
                        <button onclick="showPrintPreview()" type="button"
                            class="text-2xl font-semibold text-white bg-red-500 hover:bg-red-600 py-3 px-8 rounded-lg shadow-lg flex items-center">
                            <i class="fas fa-print mr-3"></i> CETAK
                        </button>
                    </div>
                </div>
            </div>

            <!-- Tampilan Cetak-->

            <div id="print-preview"
                class="hidden fixed inset-0 bg-black bg-opacity-80 flex items-center justify-center z-50">
                <div class="bg-slate-200 p-10 rounded-lg w-11/12 max-w-2xl ">
                    <div class="flex justify-between items-center p-10">
                        <h2 class="text-xl font-semibold mx-auto">Cetak Antrian Anda</h2>
                        <button onclick="hidePrintPreview()" type="button"
                            class="text-red-500 text-4xl font-bold">&times;</button>
                    </div>

                    <!-- Konten yang akan dicetak -->

                    <div class="container mx-auto flex justify-center ">
                        <div class="bg-white rounded-xl shadow-xl p-10 max-w-lg w-full border py-20">
                            <div class="text-center">
                                <h2 class="text-4xl font-extrabold text-blue-800">No Antrian Anda</h2>
                                <h1
                                    class="text-6xl font-semibold text-green-500 mt-4 border-b-4 border-green-400 inline-block pb-2">
                                    {{ $antrian }}</h1>

                                <h5 class="mt-6 text-xl font-medium text-gray-800">Sisa Antrian: <span
                                        class="text-red-500 font-semibold">{{ $sisaAntrian }}</span></h5>
                                {{-- Ini yang hanyar di tambahi --}}
                                <h5 class="mt-4 text-xl font-medium text-gray-800">Claster 2,3 atau Gigi</h5>
                                <h5 class="mt-4 text-xl font-medium text-gray-800">Catatan:</h5>
                                <h5 class="mt-2 text-md font-medium text-gray-500 text-justify px-10">Lorem ipsum dolor sit
                                    amet, consectetur
                                    adipisicing elit. Officia sed vitae doloribus? Minima ab esse hic eum quaerat, aperiam
                                    provident laborum.</h5>
                                <p class="mt-4 text-gray-500">No Antrian berlaku sesuai tanggal yang diterbitkan</p>
                                <p class="pt-2">{{ $tanggal . ' - ' . $waktu }}</p>
                            </div>

                        </div>
                    </div>

                    <!-- Tombol Cetak -->
                    <div class="flex mt-10 justify-center">
                        <button type="submit"
                            class="text-2xl font-semibold text-white bg-red-500 hover:bg-red-600 py-3 px-8 rounded-lg shadow-lg flex items-center">
                            <i class="fas fa-print mr-3"></i> CETAK
                        </button>
                    </div>
                </div>

            </div>
        </form>

    </main>

    <script src="{{ asset('js/user/antrianUmum.js') }}"></script>
@endsection
