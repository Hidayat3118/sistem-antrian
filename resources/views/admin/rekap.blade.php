@extends('komponen.app')

@section('content')
    <div class="flex">
        @include('komponen.sidebar')


        <main class="w-full flex flex-col ">
            @include('komponen.headerAdmin')

            {{-- Isi --}}
            <main class="container mx-auto py-10 ">

                <div class="flex items-center space-x-6">
                    <i class="fas fa-file-alt text-blue-500 text-4xl"></i>
                    <h2 class="text-4xl font-semibold">Menu Rekap</h2>
                </div>

                <div class="flex items-center mt-16 container justify-center gap-8 p-4 ">

                    <div class="flex items-center gap-4">
                        <label for="tanggal" class="text-black font-semibold mb-1 flex rounded-lg">Cari Tanggal:</label>
                        <input type="text" id="tanggal"
                            class="text-black px-8 py-2 rounded border border-gray-300 focus:outline-none focus:border-indigo-500">
                    </div>

                    <div class="flex  items-center gap-4">
                        <label for="bulan" class="text-black font-semibold mb-1">Pilih Bulan:</label>
                        <select id="bulan"
                            class="rounded-lg border border-gray-300 shadow-sm focus:border-indigo-500 
                        focus:ring focus:ring-indigo-200 bg-white text-gray-900 transition duration-150 ease-in-out hover:bg-indigo-50 px-8 py-2">
                            <option value="">Pilih Bulan</option>
                            <option value="januari">Januari</option>
                            <option value="februari">Februari</option>
                            <option value="maret">Maret</option>
                            <option value="april">April</option>
                            <option value="mei">Mei</option>
                            <option value="juni">Juni</option>
                            <option value="juli">Juli</option>
                            <option value="agustus">Agustus</option>
                            <option value="september">September</option>
                            <option value="oktober">Oktober</option>
                            <option value="november">November</option>
                            <option value="desember">Desember</option>
                        </select>
                    </div>

                    <div class="flex items-center gap-4">
                        <label for="tahun" class="text-black font-semibold mb-1">Cari Tahun:</label>
                        <input type="text" id="tahun"
                            class="text-black px-8 py-2 rounded border border-gray-300 focus:outline-none focus:border-indigo-500">
                    </div>

                    <button
                        class="bg-green-500 px-8 py-2 font-semibold rounded-lg text-white flex justify-center items-center gap-3 text-xl transform transition hover:scale-110 duration-300">
                        <span>Cari</span>
                        <i class="fa-solid fa-magnifying-glass"></i>
                    </button>

                </div>


                {{-- Kotak Border --}}

                <table class="min-w-full border border-blue-500 mt-10">
                    <thead>
                        <tr class="bg-sky-500 text-white">
                            <th class="border border-blue-500 px-4 py-2">Tanggal</th>
                            <th class="border border-blue-500 px-4 py-2">Antiran Umum</th>
                            <th class="border border-blue-500 px-4 py-2">Antiran Prioritas</th>
                            <th class="border border-blue-500 px-4 py-2">Antrian Tidak Di Layani</th>

                        </tr>
                    </thead>
                    {{-- Isi Kotak nya --}}
                    <tbody class="bg-white text-center">
                        <tr>
                            <td class="border border-blue-500 px-4 py-2">30-12-2024</td>
                            <td class="border border-blue-500 px-4 py-2">30</td>
                            <td class="border border-blue-500 px-4 py-2">30</td>
                            <td class="border border-blue-500 px-4 py-2">5</td>

                        </tr>
                        <tr>
                            <td class="border border-blue-500 px-4 py-2">24-12-2024</td>
                            <td class="border border-blue-500 px-4 py-2">24</td>
                            <td class="border border-blue-500 px-4 py-2">20</td>
                            <td class="border border-blue-500 px-4 py-2">8</td>

                        </tr>
                        <tr>
                            <td class="border border-blue-500 px-4 py-2">19-12-2024</td>
                            <td class="border border-blue-500 px-4 py-2">56</td>
                            <td class="border border-blue-500 px-4 py-2">30</td>
                            <td class="border border-blue-500 px-4 py-2">3</td>

                        </tr>
                        <tr>
                            <td class="border border-blue-500 px-4 py-2">20-12-2024</td>
                            <td class="border border-blue-500 px-4 py-2">87</td>
                            <td class="border border-blue-500 px-4 py-2">50</td>
                            <td class="border border-blue-500 px-4 py-2">5</td>

                        </tr>
                    </tbody>

                </table>

            </main>



        </main>
    </div>
@endsection
