@extends('komponen.app')

@section('content')
    <div class="flex ">
        {{-- Sidebar --}}
        @include('komponen.sidebar')
        <main class="container mx-auto py-10">

            <div>
                <h2 class="text-4xl font-semibold">Menu Rekap</h2>
            </div>

            <div class="flex items-end gap-6 mt-20 container justify-center">

                <div class="flex gap-4 items-center ">
                    <label for="tgl_minjam" class="block font-bold text-black mb-1">Cari Tanggal Rekap : </label>
                    <input type="date" class="p-3 rounded-lg border-black border" id="tgl_minjam" name="tgl_minjam"
                        placeholder="Pilih Tanggal Pinjam"required>
                </div>

                <button
                    class="bg-sky-500 px-8 h-[3rem] font-semibold rounded-lg text-white flex justify-center items-center gap-3 text-xl transform transition hover:scale-110 duration-300">
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

    </div>
@endsection
